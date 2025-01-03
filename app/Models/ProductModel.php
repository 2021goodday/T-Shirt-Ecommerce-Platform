<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'category', 'price', 'image', 'stock', 'status', 'created_at', 'updated_at'];

    // Method to fetch only active products
    public function getActiveProducts()
    {
        return $this->where('status', 'active')->findAll();
    }

}
