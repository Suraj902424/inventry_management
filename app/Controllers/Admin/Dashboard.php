<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VendorModel;
use App\Models\InventoryModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') !== 'admin') {
            redirect()->to('/admin/login')->send();
            exit;
        }
    }

    public function index()
    {
        $vendorModel    = new VendorModel();
        $inventoryModel = new InventoryModel();

        $viewData = [
            'vendorCount'    => $vendorModel->countAllResults(),
            'inventoryCount' => $inventoryModel->countAllResults(),
        ];

        return view('admin/layout', [
            'title'    => 'Admin Dashboard',
            'view'     => 'admin/dashboard',
            'viewData' => $viewData,
        ]);
    }
}
