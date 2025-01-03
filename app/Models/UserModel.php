<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role'];

    // Add validation rules
    protected $validationRules = [
        'name' => 'required|string|max_length[255]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
    ];

    // Add custom error messages (optional)
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'This email is already registered.',
            'valid_email' => 'Please provide a valid email address.',
        ],
        'password' => [
            'min_length' => 'Password must be at least 8 characters long.',
        ],
    ];
}
