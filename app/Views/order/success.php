<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto">
    <!-- Success Animation Container -->
    <div class="text-center mb-8 animate-bounce-gentle">
        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full shadow-2xl mb-4 animate-pulse">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent mb-2">
            Pesanan Berhasil Dibuat!
        </h1>
        <p class="text-gray-600 text-lg">Terima kasih atas pesanan Anda</p>
    </div>

    <!-- Success Card -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-500 via-emerald-600 to-teal-700 px-8 py-6">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Konfirmasi Pesanan</h2>
                    <p class="text-green-100">Pesanan Anda telah berhasil dibuat dan konfirmasi telah dikirim ke email Anda</p>
                </div>
            </div>
        </div>

        <div class="p-8 space-y-8">
            <!-- Success Alert -->
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-6">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-green-800">Email Konfirmasi Terkirim</h3>
                        <p class="text-green-600">Silakan cek email Anda untuk detail pesanan lengkap</p>
                    </div>
                </div>
            </div>

            <!-- Order Information -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Informasi Pesanan
                </h3>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="bg-white rounded-xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Nomor Pesanan</span>
                                <span class="text-lg font-bold text-blue-600"><?= $order['order_number'] ?></span>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Nama Pemesan</span>
                                <span class="text-lg font-semibold text-gray-800"><?= $order['customer_name'] ?></span>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Email</span>
                                <span class="text-lg text-gray-700"><?= $order['customer_email'] ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white rounded-xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Telepon</span>
                                <span class="text-lg text-gray-700"><?= $order['phone'] ?></span>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Total</span>
                                <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                    Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                                </span>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-4 border border-gray-100">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-600">Status</span>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                    <?php if ($order['status'] === 'pending'): ?>
                                        bg-yellow-100 text-yellow-800 border border-yellow-200
                                    <?php elseif ($order['status'] === 'processing'): ?>
                                        bg-blue-100 text-blue-800 border border-blue-200
                                    <?php elseif ($order['status'] === 'completed'): ?>
                                        bg-green-100 text-green-800 border border-green-200
                                    <?php else: ?>
                                        bg-gray-100 text-gray-800 border border-gray-200
                                    <?php endif; ?>">
                                    <div class="w-2 h-2 rounded-full mr-2 
                                        <?php if ($order['status'] === 'pending'): ?>
                                            bg-yellow-500 animate-pulse
                                        <?php elseif ($order['status'] === 'processing'): ?>
                                            bg-blue-500 animate-pulse
                                        <?php elseif ($order['status'] === 'completed'): ?>
                                            bg-green-500
                                        <?php else: ?>
                                            bg-gray-500
                                        <?php endif; ?>">
                                    </div>
                                    <?= ucfirst($order['status']) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Detail Pesanan
                </h3>

                <div class="overflow-hidden rounded-xl border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gradient-to-r from-purple-600 to-pink-600">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-white">Produk</th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-white">Jumlah</th>
                                    <th class="px-6 py-4 text-right text-sm font-semibold text-white">Harga Satuan</th>
                                    <th class="px-6 py-4 text-right text-sm font-semibold text-white">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($orderItems as $index => $item): ?>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200 <?= $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' ?>">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                    </svg>
                                                </div>
                                                <span class="font-medium text-gray-800"><?= $item['product_name'] ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                <?= $item['quantity'] ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right font-medium text-gray-700">
                                            Rp <?= number_format($item['unit_price'], 0, ',', '.') ?>
                                        </td>
                                        <td class="px-6 py-4 text-right font-bold text-purple-600">
                                            Rp <?= number_format($item['total_price'], 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Total Summary -->
            <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-2xl p-6 border border-indigo-100">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between space-y-4 lg:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Total Pembayaran</p>
                            <p class="text-4xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                            </p>
                        </div>
                    </div>

                    <!-- Status Badge Large -->
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-600 mb-1">Status Pesanan</p>
                            <span class="inline-flex items-center px-4 py-2 rounded-xl text-lg font-semibold
                                <?php if ($order['status'] === 'pending'): ?>
                                    bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-lg
                                <?php elseif ($order['status'] === 'processing'): ?>
                                    bg-gradient-to-r from-blue-500 to-cyan-600 text-white shadow-lg
                                <?php elseif ($order['status'] === 'completed'): ?>
                                    bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg
                                <?php else: ?>
                                    bg-gradient-to-r from-gray-500 to-gray-600 text-white shadow-lg
                                <?php endif; ?>">
                                <div class="w-3 h-3 rounded-full mr-3 
                                    <?php if ($order['status'] === 'pending'): ?>
                                        bg-yellow-200 animate-pulse
                                    <?php elseif ($order['status'] === 'processing'): ?>
                                        bg-blue-200 animate-pulse
                                    <?php elseif ($order['status'] === 'completed'): ?>
                                        bg-green-200
                                    <?php else: ?>
                                        bg-gray-200
                                    <?php endif; ?>">
                                </div>
                                <?= ucfirst($order['status']) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Details Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        <span class="text-2xl font-bold"><?= $order['order_number'] ?></span>
                    </div>
                    <p class="text-blue-100 text-sm">Nomor Pesanan</p>
                    <p class="text-white font-semibold">Simpan nomor ini untuk referensi</p>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span class="text-2xl font-bold"><?= count($orderItems) ?></span>
                    </div>
                    <p class="text-green-100 text-sm">Total Item</p>
                    <p class="text-white font-semibold">Produk yang dipesan</p>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <svg class="w-8 h-8 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-lg font-bold"><?= $order['customer_name'] ?></span>
                    </div>
                    <p class="text-purple-100 text-sm">Nama Pelanggan</p>
                    <p class="text-white font-semibold">Pemesan</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
                <a href="<?= base_url('/order') ?>"
                    class="flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Buat Pesanan Baru</span>
                </a>

                <button onclick="window.print()"
                    class="flex items-center justify-center space-x-3 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    <span>Cetak Pesanan</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Celebration Animation -->
<div id="celebration" class="fixed inset-0 pointer-events-none z-50">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <!-- Confetti elements will be added by JavaScript -->
    </div>
</div>

<script>
    // Celebration animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Create confetti effect
        createConfetti();

        // Add entrance animations to cards
        const cards = document.querySelectorAll('[class*="bg-gradient-to"]');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease-out';

                requestAnimationFrame(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                });
            }, index * 100);
        });
    });

    function createConfetti() {
        const colors = ['#3B82F6', '#8B5CF6', '#10B981', '#F59E0B', '#EF4444', '#EC4899'];
        const celebration = document.getElementById('celebration');

        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = '10px';
                confetti.style.height = '10px';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.left = Math.random() * window.innerWidth + 'px';
                confetti.style.top = '-10px';
                confetti.style.borderRadius = '50%';
                confetti.style.pointerEvents = 'none';
                confetti.style.animation = `fall ${2 + Math.random() * 3}s linear forwards`;

                // Add CSS animation
                if (!document.getElementById('confetti-styles')) {
                    const style = document.createElement('style');
                    style.id = 'confetti-styles';
                    style.textContent = `
                        @keyframes fall {
                            0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
                            100% { transform: translateY(${window.innerHeight + 10}px) rotate(360deg); opacity: 0; }
                        }
                    `;
                    document.head.appendChild(style);
                }

                document.body.appendChild(confetti);

                // Remove confetti after animation
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }, i * 50);
        }
    }

    // Print styles
    const printStyles = `
        @media print {
            body { background: white !important; }
            .fixed { display: none !important; }
            .bg-gradient-to-r, .bg-gradient-to-br { background: #f8fafc !important; color: #1f2937 !important; }
            .shadow-xl, .shadow-2xl, .shadow-lg { box-shadow: none !important; }
            .rounded-3xl, .rounded-2xl, .rounded-xl { border-radius: 8px !important; }
        }
    `;

    const styleElement = document.createElement('style');
    styleElement.textContent = printStyles;
    document.head.appendChild(styleElement);
</script>

<?= $this->endSection() ?>