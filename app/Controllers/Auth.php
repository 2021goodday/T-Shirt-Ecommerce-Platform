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
                'role' => 'customer', // Automatically set role to customer
            ];

            $userModel = new UserModel();
            if (!$userModel->insert($data)) {
                error_log(json_encode($userModel->errors())); // Log model errors for debugging
                return redirect()->back()->with('error', 'Failed to save user data.');
            }

            return redirect()->to('/auth/login')->with('success', 'Registration successful!');
        }

        $data['userType'] = 'customer';
        return view('auth/customer-register_login', $data);
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

}
