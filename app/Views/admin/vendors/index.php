<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vendors as $vendor): ?>
            <tr>
                <td><?= $vendor['id'] ?></td>
                <td><?= esc($vendor['name']) ?></td>
                <td><?= esc($vendor['login_email']) ?></td>
                <td><?= esc($vendor['phone']) ?></td>
                <td>
                    <span class="badge badge-success">Active</span>  <!-- ← HAMESHA ACTIVE -->
                </td>
                <td>
                    <a href="<?= site_url('admin/vendors/edit/' . $vendor['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?= site_url('admin/vendors/delete/' . $vendor['id']) ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('Delete?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
