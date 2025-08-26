<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Update Status Pesanan</title>
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
            background-color: #17a2b8;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .status-badge {
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
        }

        .status-confirmed {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-processing {
            background-color: #cce5ff;
            color: #004085;
        }

        .status-shipped {
            background-color: #d4edda;
            color: #155724;
        }

        .status-delivered {
            background-color: #d1e7dd;
            color: #0f5132;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>📦 Update Status Pesanan</h1>
        </div>

        <div class="content">
            <p>Halo <strong><?= $order['customer_name'] ?></strong>,</p>

            <p>Status pesanan Anda telah diupdate!</p>

            <p><strong>Nomor Pesanan:</strong> <?= $order['order_number'] ?></p>

            <p><strong>Status Terbaru:</strong></p>
            <div class="status-badge status-<?= $newStatus ?>">
                <?= getStatusMessage($newStatus) ?>
            </div>

            <?php
            function getStatusMessage($status)
            {
                $messages = [
                    'pending' => '⏳ Menunggu Konfirmasi',
                    'confirmed' => '✅ Dikonfirmasi',
                    'processing' => '📦 Sedang Diproses',
                    'shipped' => '🚚 Dikirim',
                    'delivered' => '✅ Diterima',
                    'cancelled' => '❌ Dibatalkan'
                ];
                return $messages[$status] ?? 'Status Tidak Diketahui';
            }
            ?>

            <p>
                <?php
                switch ($newStatus) {
                    case 'confirmed':
                        echo 'Pesanan Anda telah dikonfirmasi dan akan segera diproses.';
                        break;
                    case 'processing':
                        echo 'Pesanan Anda sedang dalam proses pengemasan.';
                        break;
                    case 'shipped':
                        echo 'Pesanan Anda telah dikirim dan sedang dalam perjalanan.';
                        break;
                    case 'delivered':
                        echo 'Pesanan Anda telah berhasil diterima. Terima kasih!';
                        break;
                    case 'cancelled':
                        echo 'Pesanan Anda telah dibatalkan. Untuk informasi lebih lanjut, silakan hubungi customer service kami.';
                        break;
                    default:
                        echo 'Status pesanan Anda telah diupdate.';
                }
                ?>
            </p>

            <p>Jika ada pertanyaan, jangan ragu untuk menghubungi kami.</p>

            <p>Terima kasih!</p>
        </div>
    </div>
</body>

</html>