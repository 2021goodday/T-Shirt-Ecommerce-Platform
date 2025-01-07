namespace App\Controllers;

use App\Models\OrderModel;

class AdminOrders extends BaseController
{
    public function index()
{
    echo 'AdminOrders::index method triggered.<br>';

    $orderModel = new OrderModel();
    $data['orders'] = $orderModel->findAll();

    echo '<pre>';
    print_r($data['orders']);
    echo '</pre>';

    return view('admin/orders', $data);
}


    public function updateStatus($id)
    {
        $orderModel = new OrderModel();
        $status = $this->request->getPost('status');

        $orderModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/orders')->with('success', 'Order status updated successfully.');
    }
}
