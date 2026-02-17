<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Admin Panel') ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f8f9fa;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: #343a40;
            color: #fff;
        }

        .sidebar .brand {
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            background: #212529;
            text-align: center;
        }

        .sidebar a {
            color: #ddd;
            display: block;
            padding: 12px 18px;
            text-decoration: none;
            border-bottom: 1px solid #444;
        }

        .sidebar a:hover {
            background: #495057;
            color: #fff;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 25px;
        }

        /* Top bar */
        .topbar {
            background: #fff;
            padding: 12px 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="brand">
            Admin Panel
        </div>

        <a href="<?= site_url('admin') ?>">Dashboard</a>
        <a href="<?= site_url('admin/vendors') ?>">Vendors</a>
        <a href="<?= site_url('admin/inventory') ?>">Inventory</a>
        <a href="<?= site_url('admin/logout') ?>">Logout</a>

    </div>


    <!-- Main Area -->
    <div class="content">

        <!-- Top Bar -->
        <div class="topbar d-flex justify-content-between align-items-center">

            <h5 class="mb-0"><?= esc($title ?? 'Dashboard') ?></h5>

            <span class="text-muted">
                Admin
            </span>

        </div>


        <!-- Page Content -->
        <?php if (isset($view)): ?>
            <?= view($view, $viewData ?? []); ?>
        <?php endif; ?>

    </div>

</div>


<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
