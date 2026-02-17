<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VendorModel;

class Vendors extends BaseController
{
    protected $vendorModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        if (session()->get('role') !== 'admin') {
            redirect()->to('/admin/login')->send();
            exit;
        }
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        $vendors = $this->vendorModel->findAll();
        
        return view('admin/layout', [
            'title'    => 'Manage Vendors',
            'view'     => 'admin/vendors/index',
            'viewData' => ['vendors' => $vendors]
        ]);
    }

    public function create()
    {
        return view('admin/layout', [
            'title'    => 'Add Vendor',
            'view'     => 'admin/vendors/form',
            'viewData' => []
        ]);
    }

    public function store()
    {
        $rules = [
            'name'       => 'required|min_length[3]',
            'login_email'=> 'required|valid_email|is_unique[vendors.login_email]',
            'phone'      => 'required|min_length[10]',
            'password'   => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return view('admin/layout', [
                'title'    => 'Add Vendor',
                'view'     => 'admin/vendors/form',
                'viewData' => ['validation' => $this->validator]
            ]);
        }

        $this->vendorModel->save([
            'name'        => $this->request->getPost('name'),
            'login_email' => $this->request->getPost('login_email'),
            'phone'       => $this->request->getPost('phone'),
            'address'     => $this->request->getPost('address'),
            'password'    => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'status'      => 'active',
        ]);

        return redirect()->to('/admin/vendors')->with('message', 'Vendor created successfully');
    }
}
