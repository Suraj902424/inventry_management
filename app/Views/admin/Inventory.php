<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InventoryModel;
use App\Models\VendorModel;

class Inventory extends BaseController
{
    protected $inventoryModel;
    protected $vendorModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        if (session()->get('role') !== 'admin') {
            redirect()->to('/admin/login')->send();
            exit;
        }
        $this->inventoryModel = new InventoryModel();
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        $builder = $this->inventoryModel->builder();
        $builder->select('inventory_items.*, vendors.name as vendor_name');
        $builder->join('vendors', 'vendors.id = inventory_items.vendor_id', 'left');
        $items = $builder->get()->getResultArray();

        return view('admin/layout', [
            'title'    => 'All Inventory',
            'view'     => 'admin/inventory/index',
            'viewData' => ['items' => $items]
        ]);
    }
}
