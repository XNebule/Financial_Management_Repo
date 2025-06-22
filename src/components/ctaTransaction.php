<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Transaksi
            <small>Data Transaksi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">

                    <div class="box-header">
                        <h3 class="box-title">Transaksi Pemasukan & Pengeluaran</h3>
                        <div class="btn-group pull-right">

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> &nbsp Tambah Transaksi
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <!-- Modal -->
                        <form action="transaksi_act.php" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" name="tanggal" required="required" class="form-control datepicker2">
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis</label>
                                                <select name="jenis" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                    <option value="Pemasukan">Pemasukan</option>
                                                    <option value="Pengeluaran">Pengeluaran</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="kategori" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Nominal</label>
                                                <input type="number" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal ..">
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea name="keterangan" class="form-control" rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Rekening Bank</label>
                                                <select name="bank" class="form-control" required="required">
                                                    <option value="">- Pilih -</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%" rowspan="2">NO</th>
                                        <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                                        <th rowspan="2" class="text-center">KATEGORI</th>
                                        <th rowspan="2" class="text-center">KETERANGAN</th>
                                        <th colspan="2" class="text-center">JENIS</th>
                                        <th rowspan="2" width="10%" class="text-center">OPSI</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">PEMASUKAN</th>
                                        <th class="text-center">PENGELUARAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal">
                                                    <i class="fa fa-cog"></i>
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal">
                                                    <i class="fa fa-trash"></i>
                                                </button>


                                                <form action="transaksi_update.php" method="post">
                                                    <div class="modal fade" id="edit_transaksi_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel">Edit transaksi</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Tanggal</label>
                                                                        <input type="hidden" name="id">
                                                                        <input type="text" style="width:100%" name="tanggal" required="required" class="form-control datepicker2">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Jenis</label>
                                                                        <select name="jenis" style="width:100%" class="form-control" required="required">
                                                                            <option value="">- Pilih -</option>
                                                                            <option>Pemasukan</option>
                                                                            <option>Pengeluaran</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Kategori</label>
                                                                        <select name="kategori" style="width:100%" class="form-control" required="required">
                                                                            <option value="">- Pilih -</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Nominal</label>
                                                                        <input type="number" style="width:100%" name="nominal" required="required" class="form-control" placeholder="Masukkan Nominal ..">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Keterangan</label>
                                                                        <textarea name="keterangan" style="width:100%" class="form-control" rows="4"></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- modal hapus -->
                                                <div class="modal fade" id="hapus_transaksi_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <p>Yakin ingin menghapus data ini ?</p>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <a href="transaksi_hapus.php?id=" class="btn btn-primary">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>

</div>