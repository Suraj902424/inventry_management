<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table         = 'inventory_items';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'vendor_id',
        'name',
        'sku',
        'quantity',
        'price',
        'low_stock_threshold',
    ];
    protected $useTimestamps = true;
}
