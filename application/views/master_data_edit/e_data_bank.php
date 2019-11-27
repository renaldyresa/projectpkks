<div class="container p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col"></div>
        <div class="col-10 formulir">
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif ; ?>
            <?php foreach( $data as $dt) :?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="kode_b">tanggal</label>
                    <input type="text" name="tgl" class="form-control" value="<?= $dt['Tanggal'] ?>">
                </div>
                <div class="form-group">
                    <label for="nama_b">Nama Bank</label>
                    <input type="text" name="nama_b" class="form-control" value="<?= $dt['Nama_Bank'] ?>">
                </div>
                <div class="form-group">
                    <label for="no_rek">Nomor Rekening</label>
                    <input type="text" name="no_rek" class="form-control" value="<?= $dt['No_Rekening'] ?>">
                </div>
                <div class="form-group">
                    <label for="j_rek">Jenis Rekening</label>
                    <input type="text" name="j_rek" class="form-control"  value="<?= $dt['Jenis_Rekening'] ?>">
                </div>
                <div class="form-group">
                    <label for="kredit">Kredit</label>
                    <input type="text" name="kredit" class="form-control"  value="<?= $dt['Kredit'] ?>">
                </div>
                <div class="form-group">
                    <label for="debit">Debit</label>
                    <input type="text" name="debit" class="form-control"  value="<?= $dt['Debit'] ?>">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control"  value="<?= $dt['Keterangan'] ?>">
                </div>
                <span class="float-right">  
                    <a class="btn btn-danger" href="<?= base_url()?>master_data/data_bank_c">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>  
                </span>
            </form>
            <?php endforeach ; ?>
        </div>
        <div class="col"></div>
    </div>
</div>  