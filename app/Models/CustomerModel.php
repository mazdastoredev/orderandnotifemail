<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'address'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function findOrCreateCustomer($data)
    {
        $customer = $this->where('email', $data['email'])->first();

        if (!$customer) {
            $this->insert($data);
            return $this->find($this->getInsertID());
        }

        return $customer;
    }
}
