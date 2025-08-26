<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pesanan</title>
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
            background-color: #007bff;
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
            color: #007bff;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Konfirmasi Pesanan</h1>
        </div>

        <div class="content">
            <p>Halo <strong><?= $order['customer_name'] ?></strong>,</p>

            <p>Terima kasih atas pesanan Anda! Berikut adalah detail pesanan Anda:</p>

            <table>
                <tr>
                    <td><strong>Nomor Pesanan:</strong></td>
                    <td><?= $order['order_number'] ?></td>
                </tr>
                <tr>
                    <td><strong>Tanggal Pesanan:</strong></td>
                    <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                </tr>
                <tr>
                    <td><strong>Status:</strong></td>
                    <td><?= ucfirst($order['status']) ?></td>
                </tr>
            </table>

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

            <h3>Alamat Pengiriman:</h3>
            <p><?= nl2br($order['address']) ?></p>

            <?php if (!empty($order['notes'])): ?>
                <h3>Catatan:</h3>
                <p><?= nl2br($order['notes']) ?></p>
            <?php endif; ?>

            <p>Pesanan Anda sedang diproses dan akan segera dikirim. Anda akan mendapatkan update status pesanan melalui email ini.</p>

            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami di:</p>
            <ul>
                <li>Email: support@ordersystem.com</li>
                <li>Telepon: (021) 1234-5678</li>
                <li>WhatsApp: +62 812-3456-7890</li>
            </ul>
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja dengan kami!</p>
            <p>&copy; 2024 Order System. All rights reserved.</p>
        </div>
    </div>
</body>

</html>