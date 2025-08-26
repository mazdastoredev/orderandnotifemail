<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-700 px-8 py-6">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between space-y-4 lg:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
                            <p class="text-purple-100">Kelola pesanan pelanggan</p>
                        </div>
                    </div>

                    <!-- Stats Summary -->
                    <div class="flex space-x-6 text-white">
                        <div class="text-center">
                            <div class="text-2xl font-bold"><?= count($orders) ?></div>
                            <div class="text-purple-200 text-sm">Total Pesanan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold">
                                <?php
                                $todayOrders = array_filter($orders, function ($order) {
                                    return date('Y-m-d', strtotime($order['order_date'])) === date('Y-m-d');
                                });
                                echo count($todayOrders);
                                ?>
                            </div>
                            <div class="text-purple-200 text-sm">Hari Ini</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold">
                                Rp <?= number_format(array_sum(array_column($orders, 'total_amount')), 0, ',', '.') ?>
                            </div>
                            <div class="text-purple-200 text-sm">Total Nilai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-slide-up">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-8 py-4 border-b border-gray-100">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between space-y-4 lg:space-y-0">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Daftar Pesanan (<?= count($orders) ?>)
                </h2>

                <!-- Filter Buttons -->
                <div class="flex space-x-2">
                    <button onclick="filterOrders('all')" class="filter-btn active px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium transition-all duration-200 hover:bg-blue-700">
                        Semua
                    </button>
                    <button onclick="filterOrders('pending')" class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 text-sm font-medium transition-all duration-200 hover:bg-yellow-500 hover:text-white">
                        Pending
                    </button>
                    <button onclick="filterOrders('processing')" class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 text-sm font-medium transition-all duration-200 hover:bg-blue-500 hover:text-white">
                        Processing
                    </button>
                    <button onclick="filterOrders('completed')" class="filter-btn px-4 py-2 rounded-lg bg-gray-200 text-gray-700 text-sm font-medium transition-all duration-200 hover:bg-green-500 hover:text-white">
                        Completed
                    </button>
                </div>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-800 to-gray-900">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    <span>No. Pesanan</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Customer</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    <span>Email</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center justify-end space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <span>Total</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Status</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Tanggal</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                <div class="flex items-center justify-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Aksi</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-lg font-medium text-gray-500">Belum ada pesanan</p>
                                            <p class="text-gray-400">Pesanan akan muncul di sini setelah pelanggan melakukan pemesanan</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $index => $order): ?>
                                <tr class="order-row hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 cursor-pointer"
                                    data-status="<?= $order['status'] ?>"
                                    style="animation-delay: <?= $index * 50 ?>ms;">

                                    <!-- Order Number -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900"><?= $order['order_number'] ?></div>
                                                <div class="text-xs text-gray-500">Order ID</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Customer -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                                                <span class="text-white font-bold text-sm">
                                                    <?= strtoupper(substr($order['customer_name'], 0, 1)) ?>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900"><?= $order['customer_name'] ?></div>
                                                <div class="text-xs text-gray-500">Pelanggan</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Email -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-sm text-gray-600"><?= $order['email'] ?></span>
                                        </div>
                                    </td>

                                    <!-- Total -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="text-lg font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                            Rp <?= number_format($order['total_amount'], 0, ',', '.') ?>
                                        </div>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <?php
                                        $statusConfig = [
                                            'pending' => ['bg' => 'from-yellow-400 to-orange-500', 'text' => 'text-white', 'dot' => 'bg-yellow-200 animate-pulse'],
                                            'confirmed' => ['bg' => 'from-cyan-400 to-blue-500', 'text' => 'text-white', 'dot' => 'bg-cyan-200 animate-pulse'],
                                            'processing' => ['bg' => 'from-blue-500 to-indigo-600', 'text' => 'text-white', 'dot' => 'bg-blue-200 animate-pulse'],
                                            'shipped' => ['bg' => 'from-purple-500 to-pink-600', 'text' => 'text-white', 'dot' => 'bg-purple-200 animate-pulse'],
                                            'delivered' => ['bg' => 'from-green-500 to-emerald-600', 'text' => 'text-white', 'dot' => 'bg-green-200'],
                                            'completed' => ['bg' => 'from-green-500 to-emerald-600', 'text' => 'text-white', 'dot' => 'bg-green-200'],
                                            'cancelled' => ['bg' => 'from-red-500 to-pink-600', 'text' => 'text-white', 'dot' => 'bg-red-200']
                                        ];
                                        $config = $statusConfig[$order['status']] ?? ['bg' => 'from-gray-500 to-gray-600', 'text' => 'text-white', 'dot' => 'bg-gray-200'];
                                        ?>
                                        <span class="inline-flex items-center px-3 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r <?= $config['bg'] ?> <?= $config['text'] ?> shadow-lg">
                                            <div class="w-2 h-2 rounded-full mr-2 <?= $config['dot'] ?>"></div>
                                            <?= ucfirst($order['status']) ?>
                                        </span>
                                    </td>

                                    <!-- Date -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900 font-medium">
                                            <?= date('d/m/Y', strtotime($order['order_date'])) ?>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            <?= date('H:i', strtotime($order['order_date'])) ?>
                                        </div>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="/admin/orders/<?= $order['id'] ?>"
                                                class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white text-xs font-medium rounded-lg transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Detail
                                            </a>

                                            <!-- Status Update Dropdown -->
                                            <div class="relative">
                                                <button onclick="toggleDropdown(<?= $order['id'] ?>)"
                                                    class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-xs font-medium rounded-lg transition-all duration-200 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                                    </svg>
                                                    Update
                                                </button>

                                                <div id="dropdown-<?= $order['id'] ?>" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-200 z-10 animate-slide-up">
                                                    <div class="py-2">
                                                        <a href="#" onclick="updateStatus(<?= $order['id'] ?>, 'pending')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-yellow-50 hover:text-yellow-600 transition-colors">
                                                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3"></div>
                                                            Pending
                                                        </a>
                                                        <a href="#" onclick="updateStatus(<?= $order['id'] ?>, 'confirmed')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-cyan-50 hover:text-cyan-600 transition-colors">
                                                            <div class="w-3 h-3 bg-cyan-500 rounded-full mr-3"></div>
                                                            Confirmed
                                                        </a>
                                                        <a href="#" onclick="updateStatus(<?= $order['id'] ?>, 'processing')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                                            Processing
                                                        </a>
                                                        <a href="#" onclick="updateStatus(<?= $order['id'] ?>, 'shipped')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-colors">
                                                            <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                                                            Shipped
                                                        </a>
                                                        <a href="#" onclick="updateStatus(<?= $order['id'] ?>, 'delivered')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors">
                                                            <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                                            Delivered
                                                        </a>
                                                        <hr class="my-1">
                                                        <a href="#" onclick="updateStatus(<?= $order['id'] ?>, 'cancelled')" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                                            <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                                                            Cancelled
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Floating Stats Cards -->
    <div class="fixed bottom-6 right-6 space-y-3 z-40">
        <!-- Today's Orders -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-3 rounded-2xl shadow-xl backdrop-blur-sm bg-opacity-90 transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <div class="text-lg font-bold">
                        <?php
                        $todayOrders = array_filter($orders, function ($order) {
                            return date('Y-m-d', strtotime($order['order_date'])) === date('Y-m-d');
                        });
                        echo count($todayOrders);
                        ?>
                    </div>
                    <div class="text-xs opacity-80">Hari Ini</div>
                </div>
            </div>
        </div>

        <!-- Pending Orders -->
        <div class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white px-4 py-3 rounded-2xl shadow-xl backdrop-blur-sm bg-opacity-90 transform hover:scale-105 transition-all duration-200">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <div class="text-lg font-bold">
                        <?php
                        $pendingOrders = array_filter($orders, function ($order) {
                            return $order['status'] === 'pending';
                        });
                        echo count($pendingOrders);
                        ?>
                    </div>
                    <div class="text-xs opacity-80">Pending</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Filter functionality
    function filterOrders(status) {
        const rows = document.querySelectorAll('.order-row');
        const buttons = document.querySelectorAll('.filter-btn');

        // Update button states
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-blue-600', 'text-white');
            btn.classList.add('bg-gray-200', 'text-gray-700');
        });

        event.target.classList.remove('bg-gray-200', 'text-gray-700');
        event.target.classList.add('active', 'bg-blue-600', 'text-white');

        // Filter rows
        rows.forEach((row, index) => {
            const rowStatus = row.dataset.status;
            if (status === 'all' || rowStatus === status) {
                row.style.display = 'table-row';
                row.style.animation = `slideUp 0.3s ease-out ${index * 50}ms forwards`;
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Dropdown functionality
    function toggleDropdown(orderId) {
        const dropdown = document.getElementById(`dropdown-${orderId}`);
        const allDropdowns = document.querySelectorAll('[id^="dropdown-"]');

        // Close other dropdowns
        allDropdowns.forEach(dd => {
            if (dd.id !== `dropdown-${orderId}`) {
                dd.classList.add('hidden');
            }
        });

        // Toggle current dropdown
        dropdown.classList.toggle('hidden');
    }

    // Update status functionality
    function updateStatus(orderId, newStatus) {
        // Hide dropdown
        document.getElementById(`dropdown-${orderId}`).classList.add('hidden');

        // Show loading state
        const statusCell = event.target.closest('tr').querySelector('td:nth-child(5)');
        const originalContent = statusCell.innerHTML;
        statusCell.innerHTML = `
            <div class="inline-flex items-center px-3 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-gray-400 to-gray-500 text-white">
                <svg class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Updating...
            </div>
        `;

        // Simulate API call (replace with actual AJAX request)
        setTimeout(() => {
            // Update the status in the UI
            const statusConfig = {
                'pending': {
                    bg: 'from-yellow-400 to-orange-500',
                    text: 'text-white',
                    dot: 'bg-yellow-200 animate-pulse'
                },
                'confirmed': {
                    bg: 'from-cyan-400 to-blue-500',
                    text: 'text-white',
                    dot: 'bg-cyan-200 animate-pulse'
                },
                'processing': {
                    bg: 'from-blue-500 to-indigo-600',
                    text: 'text-white',
                    dot: 'bg-blue-200 animate-pulse'
                },
                'shipped': {
                    bg: 'from-purple-500 to-pink-600',
                    text: 'text-white',
                    dot: 'bg-purple-200 animate-pulse'
                },
                'delivered': {
                    bg: 'from-green-500 to-emerald-600',
                    text: 'text-white',
                    dot: 'bg-green-200'
                },
                'completed': {
                    bg: 'from-green-500 to-emerald-600',
                    text: 'text-white',
                    dot: 'bg-green-200'
                },
                'cancelled': {
                    bg: 'from-red-500 to-pink-600',
                    text: 'text-white',
                    dot: 'bg-red-200'
                }
            };

            const config = statusConfig[newStatus] || {
                bg: 'from-gray-500 to-gray-600',
                text: 'text-white',
                dot: 'bg-gray-200'
            };

            statusCell.innerHTML = `
                <span class="inline-flex items-center px-3 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r ${config.bg} ${config.text} shadow-lg transform animate-bounce-gentle">
                    <div class="w-2 h-2 rounded-full mr-2 ${config.dot}"></div>
                    ${newStatus.charAt(0).toUpperCase() + newStatus.slice(1)}
                </span>
            `;

            // Update row data attribute
            event.target.closest('tr').dataset.status = newStatus;

            // Show success notification
            showNotification(`Status pesanan berhasil diubah ke ${newStatus}`, 'success');

            // Here you would make an actual AJAX request to update the database:
            // fetch(`/admin/orders/${orderId}/status`, {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/json' },
            //     body: JSON.stringify({ status: newStatus })
            // });

        }, 1000);
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('[onclick*="toggleDropdown"]') && !event.target.closest('[id^="dropdown-"]')) {
            document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });

    // Notification system
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        const bgClass = type === 'success' ?
            'from-green-500 to-emerald-600' :
            'from-red-500 to-pink-600';

        notification.className = `fixed top-6 right-6 bg-gradient-to-r ${bgClass} text-white px-6 py-4 rounded-xl shadow-xl z-50 transform translate-x-full transition-all duration-300`;
        notification.innerHTML = `
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>${message}</span>
            </div>
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Animate out and remove
        setTimeout(() => {
            notification.style.transform = 'translateX(full)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }

    // Initialize animations
    document.addEventListener('DOMContentLoaded', function() {
        // Staggered animation for table rows
        const rows = document.querySelectorAll('.order-row');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';

            setTimeout(() => {
                row.style.transition = 'all 0.3s ease-out';
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Add hover effects to table rows
        rows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(4px)';
                this.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
                this.style.boxShadow = 'none';
            });
        });

        // Real-time clock for floating stats
        updateFloatingStats();
        setInterval(updateFloatingStats, 30000); // Update every 30 seconds
    });

    function updateFloatingStats() {
        // This could be extended to fetch real-time data via AJAX
        const currentTime = new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        // Add timestamp to floating cards if needed
        const floatingCards = document.querySelectorAll('.fixed.bottom-6 .bg-gradient-to-r');
        floatingCards.forEach(card => {
            if (!card.querySelector('.timestamp')) {
                const timestamp = document.createElement('div');
                timestamp.className = 'timestamp text-xs opacity-60 mt-1';
                timestamp.textContent = `Updated: ${currentTime}`;
                card.appendChild(timestamp);
            } else {
                card.querySelector('.timestamp').textContent = `Updated: ${currentTime}`;
            }
        });
    }

    // Search functionality (if you want to add search later)
    function searchOrders() {
        const searchInput = document.getElementById('search-input');
        const searchTerm = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll('.order-row');

        rows.forEach(row => {
            const orderNumber = row.querySelector('td:first-child').textContent.toLowerCase();
            const customerName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            if (orderNumber.includes(searchTerm) || customerName.includes(searchTerm) || email.includes(searchTerm)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Auto-refresh functionality (optional)
    let autoRefreshEnabled = false;

    function toggleAutoRefresh() {
        autoRefreshEnabled = !autoRefreshEnabled;

        if (autoRefreshEnabled) {
            showNotification('Auto-refresh diaktifkan', 'success');
            // You could implement actual refresh logic here
        } else {
            showNotification('Auto-refresh dinonaktifkan', 'success');
        }
    }
</script>

<style>
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes bounceGentle {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-5px);
        }

        60% {
            transform: translateY(-3px);
        }
    }
</style>

<?php
function getStatusConfig($status)
{
    $configs = [
        'pending' => ['bg' => 'from-yellow-400 to-orange-500', 'text' => 'text-white', 'dot' => 'bg-yellow-200 animate-pulse'],
        'confirmed' => ['bg' => 'from-cyan-400 to-blue-500', 'text' => 'text-white', 'dot' => 'bg-cyan-200 animate-pulse'],
        'processing' => ['bg' => 'from-blue-500 to-indigo-600', 'text' => 'text-white', 'dot' => 'bg-blue-200 animate-pulse'],
        'shipped' => ['bg' => 'from-purple-500 to-pink-600', 'text' => 'text-white', 'dot' => 'bg-purple-200 animate-pulse'],
        'delivered' => ['bg' => 'from-green-500 to-emerald-600', 'text' => 'text-white', 'dot' => 'bg-green-200'],
        'completed' => ['bg' => 'from-green-500 to-emerald-600', 'text' => 'text-white', 'dot' => 'bg-green-200'],
        'cancelled' => ['bg' => 'from-red-500 to-pink-600', 'text' => 'text-white', 'dot' => 'bg-red-200']
    ];
    return $configs[$status] ?? ['bg' => 'from-gray-500 to-gray-600', 'text' => 'text-white', 'dot' => 'bg-gray-200'];
}
?>

<?= $this->endSection() ?>