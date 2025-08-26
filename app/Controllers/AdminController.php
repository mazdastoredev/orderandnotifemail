<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;

class AdminController extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }

    public function orders()
    {
        $data['orders'] = $this->orderModel->select('orders.*, customers.name as customer_name, customers.email')
            ->join('customers', 'customers.id = orders.customer_id')
            ->orderBy('orders.id', 'DESC')
            ->findAll();

        return view('admin/orders', $data);
    }

    public function orderDetail($orderId)
    {
        $data['order'] = $this->orderModel->getOrderWithDetails($orderId);
        $data['orderItems'] = $this->orderItemModel->getOrderItems($orderId);

        if (!$data['order']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Order not found');
        }

        return view('admin/order_detail', $data);
    }

    public function updateOrderStatus($orderId)
    {
        $newStatus = $this->request->getPost('status');

        if ($this->orderModel->update($orderId, ['status' => $newStatus])) {
            // Send status update email to customer
            $this->sendStatusUpdateEmail($orderId, $newStatus);

            return redirect()->back()->with('success', 'Status pesanan berhasil diupdate');
        }

        return redirect()->back()->with('error', 'Gagal mengupdate status pesanan');
    }

    private function sendStatusUpdateEmail($orderId, $newStatus)
    {
        $email = \Config\Services::email();
        $order = $this->orderModel->getOrderWithDetails($orderId);

        $email->setTo($order['customer_email']);
        $email->setSubject('Update Status Pesanan - ' . $order['order_number']);

        $message = view('emails/status_update', [
            'order' => $order,
            'newStatus' => $newStatus
        ]);

        $email->setMessage($message);
        $email->send();
    }
}
