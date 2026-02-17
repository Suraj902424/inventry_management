<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VendorSync</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <!-- Heading -->
    <div class="text-center mb-5">
        <h1>Avyukta</h1>
        <p class="text-muted">VendorSync</p>

        <p class="lead">
            Inventory • Orders • Vendor Dashboard
        </p>
    </div>

    <!-- Stats -->
    <div class="row text-center mb-5">

        <div class="col-md-4 mb-3">
            <div class="border p-3">
                <h4>3K+</h4>
                <p>Products</p>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="border p-3">
                <h4>220+</h4>
                <p>Vendors</p>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="border p-3">
                <h4>₹58Cr+</h4>
                <p>Sales</p>
            </div>
        </div>

    </div>

    <!-- Login Section -->
    <div class="row justify-content-center text-center">

        <div class="col-md-3 mb-3">
            <div class="border p-4">
                <h4>Admin</h4>
                <p>Manage System</p>

                <a href="<?= site_url('admin/login') ?>" class="btn btn-primary">
                    Admin Login
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="border p-4">
                <h4>Vendor</h4>
                <p>Vendor Dashboard</p>

                <a href="<?= site_url('vendor/login') ?>" class="btn btn-success">
                    Vendor Login
                </a>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="border p-4">
                <h4>New Vendor</h4>
                <p>Create Account</p>

                <a href="<?= site_url('vendor/register') ?>" class="btn btn-secondary">
                    Register
                </a>
            </div>
        </div>

    </div>

    <!-- Footer Info -->
    <div class="text-center mt-5 text-muted">
        <p>Secure • Mobile Friendly • 24x7 Support</p>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
