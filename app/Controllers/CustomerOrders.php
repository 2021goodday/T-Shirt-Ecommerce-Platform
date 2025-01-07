namespace App\Controllers;

use App\Models\OrderModel;

class CustomerOrders extends BaseController
{
    public function index()
{
    echo 'CustomerOrders::index method triggered.<br>';
    
    $orderModel = new OrderModel();
    $customerId = session()->get('user')['id']; // Ensure session user ID exists

    echo 'Customer ID: ' . $customerId . '<br>';

    $data['orders'] = $orderModel->where('customer_id', $customerId)->findAll();
    echo '<pre>';
    print_r($data['orders']);
    echo '</pre>';

    return view('customer/orders', $data);
}

}
