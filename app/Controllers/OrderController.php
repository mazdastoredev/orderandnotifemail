<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class OrderController extends BaseController
{
    protected $productModel;
    protected $customerModel;
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        // Load Form Helper
        helper(['form', 'url']);
        $this->productModel = new ProductModel();
        $this->customerModel = new CustomerModel();
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->getAvailableProducts();
        return view('order/create', $data);
    }

    public function create()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request'
            ]);
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'customer_name'   => 'required|min_length[3]',
            'customer_email'  => 'required|valid_email',
            'customer_phone'  => 'required',
            'customer_address' => 'required',
            'products'        => 'required',
            'quantities'      => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validation->getErrors()
            ]);
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Create or find customer
            $customerData = [
                'name'    => $this->request->getPost('customer_name'),
                'email'   => $this->request->getPost('customer_email'),
                'phone'   => $this->request->getPost('customer_phone'),
                'address' => $this->request->getPost('customer_address')
            ];

            $customer = $this->customerModel->findOrCreateCustomer($customerData);

            // Create order
            $orderNumber  = $this->orderModel->generateOrderNumber();
            $products     = $this->request->getPost('products');
            $quantities   = $this->request->getPost('quantities');
            $totalAmount  = 0;

            foreach ($products as $index => $productId) {
                $product  = $this->productModel->find($productId);
                $quantity = (int) $quantities[$index];

                if (!$product || $product['stock'] < $quantity) {
                    throw new \Exception('Stok produk tidak mencukupi');
                }

                $totalAmount += $product['price'] * $quantity;
            }

            $orderData = [
                'customer_id'  => $customer['id'],
                'order_number' => $orderNumber,
                'total_amount' => $totalAmount,
                'status'       => 'pending',
                'notes'        => $this->request->getPost('notes') ?? ''
            ];

            $this->orderModel->insert($orderData);
            $orderId = $this->orderModel->getInsertID();

            // Create order items and update stock
            foreach ($products as $index => $productId) {
                $product  = $this->productModel->find($productId);
                $quantity = (int) $quantities[$index];

                $orderItemData = [
                    'order_id'    => $orderId,
                    'product_id'  => $productId,
                    'quantity'    => $quantity,
                    'unit_price'  => $product['price'],
                    'total_price' => $product['price'] * $quantity
                ];

                $this->orderItemModel->insert($orderItemData);
                $this->productModel->updateStock($productId, $quantity);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }

            // Send email notification
            $this->sendOrderNotification($orderId);

            // ✅ Balikin JSON kalau AJAX
            return $this->response->setJSON([
                'success' => true,
                'orderId' => $orderId
            ]);
        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }




    public function success($orderId)
    {
        $data['order'] = $this->orderModel->getOrderWithDetails($orderId);
        $data['orderItems'] = $this->orderItemModel->getOrderItems($orderId);

        if (!$data['order']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Order not found');
        }

        return view('order/success', $data);
    }

    private function sendOrderNotification($orderId)
    {
        $email = \Config\Services::email();

        $order = $this->orderModel->getOrderWithDetails($orderId);
        $orderItems = $this->orderItemModel->getOrderItems($orderId);

        // Email to customer
        $email->setTo($order['customer_email']);
        $email->setSubject('Konfirmasi Pesanan - ' . $order['order_number']);

        $message = view('emails/order_confirmation', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);

        $email->setMessage($message);

        if (!$email->send()) {
            log_message('error', 'Failed to send order confirmation email: ' . $email->printDebugger());
        }

        // Email to admin (optional)
        $email->clear();
        $email->setTo('admin@yourdomain.com'); // Ganti dengan email admin
        $email->setSubject('Pesanan Baru - ' . $order['order_number']);

        $adminMessage = view('emails/new_order_admin', [
            'order' => $order,
            'orderItems' => $orderItems
        ]);

        $email->setMessage($adminMessage);
        $email->send();
    }
}
