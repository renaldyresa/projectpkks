<div class="container p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col"></div>
        <div class="col-10 formulir">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="kode_b">Kode Barang</label>
                    <input type="text" name="kode_b" class="form-control" id="k_barang" placeholder="">
                </div>
                <div class="form-group">
                    <label for="nama_b">Nama Barang</label>
                    <input type="text" name="nama_b" class="form-control" id="nama_barang" placeholder="">
                </div>
                <div class="form-group">
                    <label for="h_jual">Harga Jual</label>
                    <input type="text" name="h_jual" class="form-control" id="harga_jual" placeholder="">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="">
                </div>
                <div class=""></div>
                <span class="float-right">
                    <a class="btn btn-danger" href="<?= base_url() ?>master_data/data_barang_c">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </span>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>