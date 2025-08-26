<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 px-8 py-6">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Buat Pesanan Baru</h2>
                    <p class="text-blue-100">Lengkapi formulir di bawah untuk membuat pesanan</p>
                </div>
            </div>
        </div>

        <div class="p-8">
            <?= form_open('/order/create', ['class' => 'space-y-8']) ?>

            <!-- Customer Information -->
            <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-6 border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Informasi Pelanggan
                </h3>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                        <div class="relative">
                            <input type="text" name="customer_name" value="<?= old('customer_name') ?>" required
                                class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 <?= isset($errors['customer_name']) ? 'border-red-500 ring-2 ring-red-200' : '' ?>">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <?php if (isset($errors['customer_name'])): ?>
                            <div class="flex items-center mt-2 text-red-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm"><?= $errors['customer_name'] ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Email *</label>
                        <div class="relative">
                            <input type="email" name="customer_email" value="<?= old('customer_email') ?>" required
                                class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 <?= isset($errors['customer_email']) ? 'border-red-500 ring-2 ring-red-200' : '' ?>">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <?php if (isset($errors['customer_email'])): ?>
                            <div class="flex items-center mt-2 text-red-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm"><?= $errors['customer_email'] ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Telepon *</label>
                        <div class="relative">
                            <input type="text" name="customer_phone" value="<?= old('customer_phone') ?>" required
                                class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300">
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Alamat *</label>
                        <div class="relative">
                            <textarea name="customer_address" rows="3" required
                                class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 resize-none"><?= old('customer_address') ?></textarea>
                            <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Selection -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Pilih Produk
                    </h3>
                    <button type="button" onclick="addProduct()"
                        class="flex items-center space-x-2 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-4 py-2 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Tambah Produk</span>
                    </button>
                </div>

                <div id="product-list" class="space-y-4">
                    <!-- Initial Product Item -->
                    <div class="product-item bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200">
                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                            <div class="lg:col-span-2 space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Produk</label>
                                <select name="products[]" class="product-select w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" required>
                                    <option value="">Pilih Produk</option>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>" data-stock="<?= $product['stock'] ?>">
                                            <?= $product['name'] ?> - Rp <?= number_format($product['price'], 0, ',', '.') ?> (Stok: <?= $product['stock'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" name="quantities[]" class="quantity-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" min="1" value="1" required>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Subtotal</label>
                                <div class="relative">
                                    <input type="text" class="subtotal w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-600" readonly>
                                    <div class="absolute inset-y-0 right-3 flex items-center">
                                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                <div class="relative">
                    <textarea name="notes" rows="4"
                        class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-300 resize-none"
                        placeholder="Tambahkan catatan khusus untuk pesanan Anda..."><?= old('notes') ?></textarea>
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
            </div>

            <!-- Total and Submit -->
            <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-2xl p-6 border border-indigo-100">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between space-y-4 lg:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Total Pesanan</p>
                            <p class="text-3xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                Rp <span id="total-amount">0</span>
                            </p>
                        </div>
                    </div>

                    <button type="submit"
                        class="flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-200 transform hover:scale-105 shadow-xl hover:shadow-2xl animate-bounce-gentle">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Buat Pesanan</span>
                    </button>
                </div>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    function addProduct() {
        const productList = document.getElementById('product-list');
        const newProductItem = productList.querySelector('.product-item').cloneNode(true);

        // Reset values
        newProductItem.querySelector('.product-select').value = '';
        newProductItem.querySelector('.quantity-input').value = 1;
        newProductItem.querySelector('.subtotal').value = '';

        // Add remove button
        const removeButtonContainer = document.createElement('div');
        removeButtonContainer.className = 'lg:col-span-4 flex justify-end pt-2';

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'flex items-center space-x-2 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-4 py-2 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl';
        removeBtn.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
            <span>Hapus</span>
        `;
        removeBtn.onclick = function() {
            newProductItem.style.transform = 'scale(0.95)';
            newProductItem.style.opacity = '0';
            setTimeout(() => {
                newProductItem.remove();
                calculateTotal();
            }, 200);
        };

        removeButtonContainer.appendChild(removeBtn);
        newProductItem.querySelector('.grid').appendChild(removeButtonContainer);

        // Add animation
        newProductItem.style.opacity = '0';
        newProductItem.style.transform = 'translateY(20px)';
        productList.appendChild(newProductItem);

        setTimeout(() => {
            newProductItem.style.transition = 'all 0.3s ease-out';
            newProductItem.style.opacity = '1';
            newProductItem.style.transform = 'translateY(0)';
        }, 10);

        // Add event listeners
        addEventListeners(newProductItem);
    }

    function addEventListeners(element) {
        const productSelect = element.querySelector('.product-select');
        const quantityInput = element.querySelector('.quantity-input');

        productSelect.addEventListener('change', calculateSubtotal);
        quantityInput.addEventListener('input', calculateSubtotal);
    }

    function calculateSubtotal(event) {
        const productItem = event.target.closest('.product-item');
        const productSelect = productItem.querySelector('.product-select');
        const quantityInput = productItem.querySelector('.quantity-input');
        const subtotalInput = productItem.querySelector('.subtotal');

        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = parseFloat(selectedOption.dataset.price) || 0;
        const quantity = parseInt(quantityInput.value) || 0;
        const subtotal = price * quantity;

        subtotalInput.value = 'Rp ' + subtotal.toLocaleString('id-ID');

        calculateTotal();
    }

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.product-item').forEach(item => {
            const productSelect = item.querySelector('.product-select');
            const quantityInput = item.querySelector('.quantity-input');

            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selectedOption.dataset.price) || 0;
            const quantity = parseInt(quantityInput.value) || 0;

            total += price * quantity;
        });

        const totalElement = document.getElementById('total-amount');
        totalElement.textContent = total.toLocaleString('id-ID');

        // Add animation to total
        totalElement.style.transform = 'scale(1.1)';
        setTimeout(() => {
            totalElement.style.transform = 'scale(1)';
        }, 200);
    }

    // Initialize event listeners
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.product-item').forEach(addEventListeners);
    });
</script>

<?= $this->endSection() ?>