<div class="min-h-screen bg-gray-100">
    <section class="p-6">
        <div class="flex flex-col">
            <section class="w-full">
                <div class="bg-white rounded-lg shadow-md overflow-y-auto">

                    <div class="flex justify-between items-center p-4 border-b bg-blue-50">
                        <h3 class="text-lg font-semibold text-gray-800">Transaksi Pemasukan & Pengeluaran</h3>
                        <div class="flex space-x-2">
                            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm flex items-center" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus mr-1"></i> Tambah Transaksi
                            </button>
                        </div>
                    </div>
                    <div class="p-4">

                        <!-- Modal -->
                        <form action="transactionAct.php" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-white rounded-lg shadow-xl">
                                        <div class="modal-header border-b p-4">
                                            <h4 class="text-lg font-semibold text-gray-800" id="exampleModalLabel">Tambah Transaksi</h4>
                                            <button type="button" class="close text-gray-400 hover:text-gray-600" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-4 space-y-4">

                                            <div class="form-group">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                                                <input type="text" name="tanggal" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 datepicker2">
                                            </div>

                                            <div class="form-group">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                                                <select name="jenis" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                                    <option value="">- Pilih -</option>
                                                    <option value="income">Pemasukan</option>
                                                    <option value="expenses">Pengeluaran</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                                <input type="text" name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Kategori">
                                            </div>

                                            <div class="form-group">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                                                <input type="number" name="amount" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Nominal ..">
                                            </div>

                                            <div class="form-group">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                                                <textarea name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="3"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer border-t p-4 flex justify-end space-x-2">
                                            <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200" id="table-datatable">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1%">NO</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10%">TANGGAL</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KATEGORI</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KETERANGAN</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PEMASUKAN</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PENGELUARAN</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10%">OPSI</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                    include './dbConnection.php';
                                    $no = 1;

                                    // Get income data
                                    $income = $conn->query("SELECT * FROM income ORDER BY date DESC");
                                    while ($inc = $income->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"><?php echo $no++; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"><?php echo date('d-m-Y', strtotime($inc['date'])); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $inc['category']; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $inc['description']; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Rp. <?php echo number_format($inc['amount']); ?> ,-</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">-</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button type="button" class="text-yellow-600 hover:text-yellow-900 mr-2" data-toggle="modal" data-target="#edit_income_<?php echo $inc['id'] ?>">
                                                    <i class="fas fa-cog"></i>
                                                </button>

                                                <button type="button" class="text-red-600 hover:text-red-900" data-toggle="modal" data-target="#hapus_income_<?php echo $inc['id'] ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Edit Modal for Income -->
                                                <form action="transactionUpdate.php" method="post">
                                                    <div class="modal fade" id="edit_income_<?php echo $inc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content bg-white rounded-lg shadow-xl">
                                                                <div class="modal-header border-b p-4">
                                                                    <h4 class="text-lg font-semibold text-gray-800" id="exampleModalLabel">Edit Pemasukan</h4>
                                                                    <button type="button" class="close text-gray-400 hover:text-gray-600" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-4 space-y-4">

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                                                                        <input type="hidden" name="type" value="income">
                                                                        <input type="hidden" name="id" value="<?php echo $inc['id'] ?>">
                                                                        <input type="text" name="date" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 datepicker2" value="<?php echo $inc['date'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                                                        <input type="text" name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo $inc['category'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                                                                        <input type="number" name="amount" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo $inc['amount'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                                                                        <textarea name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="3"><?php echo $inc['description'] ?></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer border-t p-4 flex justify-end space-x-2">
                                                                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- Delete Modal for Income -->
                                                <div class="modal fade" id="hapus_income_<?php echo $inc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content bg-white rounded-lg shadow-xl">
                                                            <div class="modal-header border-b p-4">
                                                                <h4 class="text-lg font-semibold text-gray-800" id="exampleModalLabel">Peringatan!</h4>
                                                                <button type="button" class="close text-gray-400 hover:text-gray-600" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <p class="text-gray-700">Yakin ingin menghapus data pemasukan ini?</p>
                                                            </div>
                                                            <div class="modal-footer border-t p-4 flex justify-end space-x-2">
                                                                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-dismiss="modal">Tutup</button>
                                                                <a href="transactionDelete.php?type=income&id=<?php echo $inc['id'] ?>" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    // Get expenses data
                                    $expenses = $conn->query("SELECT * FROM expenses ORDER BY date DESC");
                                    while ($exp = $expenses->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"><?php echo $no++; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center"><?php echo date('d-m-Y', strtotime($exp['date'])); ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $exp['category']; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $exp['description']; ?></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">-</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Rp. <?php echo number_format($exp['amount']); ?> ,-</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button type="button" class="text-yellow-600 hover:text-yellow-900 mr-2" data-toggle="modal" data-target="#edit_expense_<?php echo $exp['id'] ?>">
                                                    <i class="fas fa-cog"></i>
                                                </button>

                                                <button type="button" class="text-red-600 hover:text-red-900" data-toggle="modal" data-target="#hapus_expense_<?php echo $exp['id'] ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Edit Modal for Expense -->
                                                <form action="transactionUpdate.php" method="post">
                                                    <div class="modal fade" id="edit_expense_<?php echo $exp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content bg-white rounded-lg shadow-xl">
                                                                <div class="modal-header border-b p-4">
                                                                    <h4 class="text-lg font-semibold text-gray-800" id="exampleModalLabel">Edit Pengeluaran</h4>
                                                                    <button type="button" class="close text-gray-400 hover:text-gray-600" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body p-4 space-y-4">

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                                                                        <input type="hidden" name="type" value="expenses">
                                                                        <input type="hidden" name="id" value="<?php echo $exp['id'] ?>">
                                                                        <input type="text" name="date" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 datepicker2" value="<?php echo $exp['date'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                                                        <input type="text" name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo $exp['category'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                                                                        <input type="number" name="amount" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="<?php echo $exp['amount'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                                                                        <textarea name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="3"><?php echo $exp['description'] ?></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer border-t p-4 flex justify-end space-x-2">
                                                                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- Delete Modal for Expense -->
                                                <div class="modal fade" id="hapus_expense_<?php echo $exp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content bg-white rounded-lg shadow-xl">
                                                            <div class="modal-header border-b p-4">
                                                                <h4 class="text-lg font-semibold text-gray-800" id="exampleModalLabel">Peringatan!</h4>
                                                                <button type="button" class="close text-gray-400 hover:text-gray-600" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-4">
                                                                <p class="text-gray-700">Yakin ingin menghapus data pengeluaran ini?</p>
                                                            </div>
                                                            <div class="modal-footer border-t p-4 flex justify-end space-x-2">
                                                                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-dismiss="modal">Tutup</button>
                                                                <a href="transactionDelete.php?type=expenses&id=<?php echo $exp['id'] ?>" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>
</div>