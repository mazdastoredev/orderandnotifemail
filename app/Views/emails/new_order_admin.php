<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pesanan Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #f8f9fa;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #e9ecef;
        }

        .total {
            font-weight: bold;
            font-size: 1.2em;
            color: #28a745;
        }

        .alert {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🛒 Pesanan Baru Masuk!</h1>
        </div>

        <div class="content">
            <div class="alert">
                <strong>Ada pesanan baru yang perlu diproses!</strong>
            </div>

            <h3>Detail Pesanan:</h3>
            <table>
                <tr>
                    <td><strong>Nomor Pesanan:</strong></td>
                    <td><?= $order['order_number'] ?></td>
                </tr>
                <tr>
                    <td><strong>Nama Customer:</strong></td>
                    <td><?= $order['customer_name'] ?></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?= $order['customer_email'] ?></td>
                </tr>
                <tr>
                    <td><strong>Telepon:</strong></td>
                    <td><?= $order['phone'] ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Pesanan:</strong></td>
                    <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                </tr>
            </table>

            <h3>Alamat Pengiriman:</h3>
            <p><?= nl2br($order['address']) ?></p>

            <h3>Detail Produk:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderItems as $item): ?>
                        <tr>
                            <td><?= $item['product_name'] ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>Rp <?= number_format($item['unit_price'], 0, ',', '.') ?></td>
                            <td>Rp <?= number_format($item['total_price'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p class="total">Total Pesanan: Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></p>

            <?php if (!empty($order['notes'])): ?>
                <h3>Catatan Customer:</h3>
                <p><?= nl2br($order['notes']) ?></p>
            <?php endif; ?>

            <p><strong>Segera proses pesanan ini dan update status di sistem.</strong></p>
        </div>
    </div>
</body>

</html>