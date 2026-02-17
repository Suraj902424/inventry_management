<h3><?= isset($vendor) ? 'Edit Vendor' : 'Add New Vendor' ?></h3>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form method="post" action="<?= isset($vendor) ? site_url('admin/vendors/update/'.$vendor['id']) : site_url('admin/vendors/store') ?>">
    <div class="form-group">
        <label>Vendor Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" required
               value="<?= isset($vendor) ? esc($vendor['name']) : old('name') ?>">
    </div>

    <div class="form-group">
        <label>Login Email <span class="text-danger">*</span></label>
        <input type="email" name="login_email" class="form-control" required
               value="<?= isset($vendor) ? esc($vendor['login_email']) : old('login_email') ?>">
    </div>

    <div class="form-group">
        <label>Phone <span class="text-danger">*</span></label>
        <input type="text" name="phone" class="form-control" required
               value="<?= isset($vendor) ? esc($vendor['phone']) : old('phone') ?>">
    </div>

    <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control"><?= isset($vendor) ? esc($vendor['address']) : old('address') ?></textarea>
    </div>

    <div class="form-group">
        <label>Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control" required>
        <small class="text-muted">Minimum 6 characters</small>
    </div>

    <button type="submit" class="btn btn-success"><?= isset($vendor) ? 'Update Vendor' : 'Create Vendor' ?></button>
    <a href="<?= site_url('admin/vendors') ?>" class="btn btn-secondary">Back to List</a>
</form>
