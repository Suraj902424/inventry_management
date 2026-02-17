<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $helpers = ['form'];

    public function login()
    {
        if (session()->get('role') === 'admin') {
            return redirect()->to('/admin');
        }

        return view('admin/layout', [
            'title'    => 'Admin Login',
            'view'     => 'admin/auth/login',
            'viewData' => [],
        ]);
    }

    public function doLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('admin/layout', [
                'title'    => 'Admin Login',
                'view'     => 'admin/auth/login',
                'viewData' => ['validation' => $this->validator],
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();
        $admin      = $adminModel->where('username', $username)->first();

        if (! $admin || ! password_verify($password, $admin['password'])) {
            return view('admin/layout', [
                'title'    => 'Admin Login',
                'view'     => 'admin/auth/login',
                'viewData' => ['loginError' => 'Invalid username or password'],
            ]);
        }

        session()->set([
            'role'        => 'admin',
            'admin_id'    => $admin['id'],
            'admin_user'  => $admin['username'],
        ]);

        return redirect()->to('/admin');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
