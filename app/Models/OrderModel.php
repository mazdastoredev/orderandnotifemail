<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'order_number', 'total_amount', 'status', 'notes'];
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';

    public function generateOrderNumber()
    {
        $prefix = 'ORD';
        $date = date('Ymd');
        $lastOrder = $this->like('order_number', $prefix . $date)->orderBy('id', 'DESC')->first();

        if ($lastOrder) {
            $lastNumber = (int) substr($lastOrder['order_number'], -4);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        return $prefix . $date . $newNumber;
    }

    public function getOrderWithDetails($orderId)
    {
        return $this->select('orders.*, customers.name as customer_name, customers.email as customer_email, customers.phone, customers.address')
            ->join('customers', 'customers.id = orders.customer_id')
            ->where('orders.id', $orderId)
            ->first();
    }
}
