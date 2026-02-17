<h3>All Inventory Items (<?= count($items ?? []) ?>)</h3>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Vendor</th>
                <th>Item Name</th>
                <th>SKU</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Low Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= esc($item['vendor_name'] ?? 'N/A') ?></td>
                    <td><?= esc($item['name']) ?></td>
                    <td><strong><?= esc($item['sku']) ?></strong></td>
                    <td>
                        <span class="badge <?= $item['quantity'] <= $item['low_stock_threshold'] ? 'badge-danger' : 'badge-success' ?>">
                            <?= $item['quantity'] ?>
                        </span>
                    </td>
                    <td>₹<?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['low_stock_threshold'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
