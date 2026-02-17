<div class="row justify-content-center">
    <div class="col-md-4">
        <h3 class="mb-3 text-center">Admin Login</h3>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($loginError)): ?>
            <div class="alert alert-danger">
                <?= esc($loginError) ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('admin/login') ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text"
                       name="username"
                       class="form-control"
                       value="<?= old('username') ?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password"
                       name="password"
                       class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
        </form>
    </div>
</div>
