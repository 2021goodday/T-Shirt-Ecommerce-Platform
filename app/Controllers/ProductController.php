<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function catalog()
    {
        $productModel = new ProductModel();

        // Get filter/search inputs
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');

        // Build query with filters
        $query = $productModel;

        if ($search) {
            $query = $query->like('name', $search);
        }

        if ($category) {
            $query = $query->where('category', $category);
        }

        // Get products
        $data['products'] = $query->findAll();

        // Pass search and category to the view
        $data['search'] = $search;
        $data['category'] = $category;

        return view('products/catalog', $data);
    }
}
