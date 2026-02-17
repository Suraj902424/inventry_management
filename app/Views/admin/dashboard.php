<h3>Admin Dashboard</h3>

<div class="row mt-3">
    <div class="col-md-6 mb-3">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">Vendors</div>
            <div class="card-body">
                <h5>Total Vendors: <?= $vendorCount ?? 0 ?></h5>
                <a href="<?= site_url('admin/vendors') ?>" class="btn btn-primary btn-sm">Manage Vendors</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card border-success">
            <div class="card-header bg-success text-white">Inventory</div>
            <div class="card-body">
                <h5>Total Items: <?= $inventoryCount ?? 0 ?></h5>
                <a href="<?= site_url('admin/inventory') ?>" class="btn btn-success btn-sm">Manage Inventory</a>
            </div>
        </div>
    </div>
</div>
