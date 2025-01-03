<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set('user', $user);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        }

        // Pass userType as 'customer' to the view
        $data['userType'] = 'customer';
        return view('auth/customer-register_login', $data);
    }

    public function register()
    {
        if (strtolower($this->request->getMethod()) === 'get') {
            return view('auth/customer-register_login');
        }
    
        if (strtolower($this->request->getMethod()) === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'role' => 'customer',
            ];
    
            $db = \Config\Database::connect();
            $builder = $db->table('users');
    
            if ($builder->insert($data)) {
                // Set success message in flashdata
                session()->setFlashdata('success', 'You can now log in.');
                return redirect()->to('/auth/customer/login');
            } else {
                session()->setFlashdata('error', 'Failed to register, please try again.');
                return redirect()->back();
            }
        }
    
        echo 'Invalid request method.<br>';
        exit;
    }
    


    public function adminLogin()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->where('role', 'admin')->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set('user', $user);
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        }

        // Pass userType as 'admin' to the view
        $data['userType'] = 'admin';
        return view('auth/admin-register_login', $data);
    }

    public function adminRegister()
    {
        if ($this->request->getMethod() === 'post') {
            $password = $this->request->getPost('password');
            $confirmPassword = $this->request->getPost('confirm_password');

            if ($password !== $confirmPassword) {
                return redirect()->back()->with('error', 'Passwords do not match.');
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'role' => 'admin', // Automatically set role to admin
            ];

            $userModel = new UserModel();
            if (!$userModel->insert($data)) {
                error_log(json_encode($userModel->errors())); // Log model errors for debugging
                return redirect()->back()->with('error', 'Failed to save admin data.');
            }

            return redirect()->to('/auth/admin/login')->with('success', 'Admin registration successful!');
        }

        $data['userType'] = 'admin';
        return view('auth/admin-register_login', $data);
    }
    public function testDatabase()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SHOW TABLES");
    
        if ($query) {
            echo "Database connected successfully!<br>";
            print_r($query->getResult());
        } else {
            echo "Database connection failed.<br>";
            echo json_encode($db->error());
        }
        exit;
    }
    public function testInsert()
{
    $db = \Config\Database::connect();
    $query = $db->query("INSERT INTO users (name, email, password, role) VALUES ('Raw Test User', 'rawtest@example.com', '" . password_hash('password123', PASSWORD_BCRYPT) . "', 'customer')");

    if ($query) {
        echo "Insert successful!";
    } else {
        echo "Insert failed.<br>";
        echo json_encode($db->error());
    }
    exit;
}

}
