<?php

namespace App\Controllers\Admin;  // ← NAMESPACE IMPORTANT

use App\Controllers\BaseController;
use App\Models\InventoryModel;
use App\Models\VendorModel;

class Inventory extends BaseController
{
    protected $inventoryModel;
    protected $vendorModel;

    public function __construct()
    {
        // Admin login check
        if (session()->get('role') !== 'admin') {
            redirect()->to('/admin/login');
        }
        
        $this->inventoryModel = new InventoryModel();
        $this->vendorModel = new VendorModel();
    }

    public function index()
    {
        // Join vendors table to show vendor names
        $builder = $this->inventoryModel;
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
