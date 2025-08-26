<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'stock', 'image'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getAvailableProducts()
    {
        return $this->where('stock >', 0)->findAll();
    }

    public function updateStock($productId, $quantity)
    {
        $product = $this->find($productId);
        if ($product) {
            $newStock = $product['stock'] - $quantity;
            return $this->update($productId, ['stock' => $newStock]);
        }
        return false;
    }
}
