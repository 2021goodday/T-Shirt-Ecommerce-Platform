<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class InventoryController extends Controller
{
    public function index()
{
    $productModel = new ProductModel();
    $data['products'] = $productModel->findAll(); // Display all products for admins

    return view('inventory/inventoryManagement', $data);
}


    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $productModel = new ProductModel();

            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'category' => $this->request->getPost('category'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
                'image' => $this->uploadImage(),
            ];

            $productModel->insert($data);

            return redirect()->to('/inventory')->with('success', 'Product added successfully!');
        }

        return view('inventory/add');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to('/inventory')->with('error', 'Product not found');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'category' => $this->request->getPost('category'),
                'price' => $this->request->getPost('price'),
                'stock' => $this->request->getPost('stock'),
            ];

            if ($this->request->getFile('image')->isValid()) {
                $data['image'] = $this->uploadImage();
            }

            $productModel->update($id, $data);

            return redirect()->to('/inventory')->with('success', 'Product updated successfully!');
        }

        $data['product'] = $product;

        return view('inventory/edit', $data);
    }

    public function delete($id)
    {
        $productModel = new ProductModel();

        if ($productModel->delete($id)) {
            return redirect()->to('/inventory')->with('success', 'Product deleted successfully!');
        }

        return redirect()->to('/inventory')->with('error', 'Failed to delete the product');
    }

    private function uploadImage()
    {
        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads/', $fileName);

            return '/uploads/' . $fileName;
        }

        return null;
    }

    public function toggleStatus($id)
    {
        $productModel = new ProductModel();

        // Find the product by ID
        $product = $productModel->find($id);

        if ($product) {
            // Toggle the status (1 = Active, 0 = Deactivated)
            $newStatus = $product['status'] == 1 ? 0 : 1;

            // Update the product status
            $productModel->update($id, ['status' => $newStatus]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Product status updated successfully.');
        } else {
            // Redirect back with an error message if the product is not found
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function updateStatus($id)
    {
        $productModel = new ProductModel();

        $data = [
            'status' => $this->request->getPost('status'),
        ];

        $productModel->update($id, $data);

        return redirect()->to('/inventory')->with('success', 'Product status updated successfully!');
    }

    public function inventoryManagement()
{
    $productModel = new ProductModel();
    $data['products'] = $productModel->findAll(); // Display all products for admins

    return view('inventory/inventoryManagement', $data);
}

}
