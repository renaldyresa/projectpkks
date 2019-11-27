<div class="container p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col"></div>
        <div class="col-10 formulir">
        <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ; ?>
        <?php foreach($data_gereja as $dt_g) : ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="kode_pkks">Kode PKKS Keuskupan (UU)</label>
                    <input type="text" class="form-control" id="kode_pkks_k"  name="kode_pkks_k" value="<?= $dt_g['Kode_PKKS_Keuskupan'] ?>" placeholder="" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_keuskupan">Nama Keuskupan</label>
                    <input type="text" name="nama_k" class="form-control" id="nama_keuskupan" value="<?= $dt_g['Nama_Keuskupan'] ?>" placeholder="">
                </div>
                <div class="form-group">
                    <label for="kode_pkks_paroki">Kode PKKS Paroki (PP)</label>
                    <input type="text" name="kode_pkks_p" class="form-control" id="kode_pkks_paroki" value="<?= $dt_g['Kode_PKKS_Paroki'] ?>" placeholder="">
                </div>
                <div class="form-group">
                    <label for="nama_paroki">Nama Paroki</label>
                    <input type="text" name="nama_p" class="form-control" id="nama_paroki" value="<?= $dt_g['Nama_Paroki'] ?>" placeholder="">
                </div>
                <div class="form-group">
                    <label>Alamat Paroki</label>
                    <textarea name="alamat_p" class="form-control" id="alamat" rows="3"><?= $dt_g['Alamat_Paroki'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telpon_paroki">No telpon Paroki</label>
                    <input type="text" name="no_tel_p"class="form-control" id="no_telpon_paroki" value="<?= $dt_g['No_Telpon_Paroki'] ?>" placeholder="">
                </div>
                <div class="form-group">
                    <label for="email_paroki">Email Paroki</label>
                    <input type="text" name="email_p" class="form-control" id="email_paroki" value="<?= $dt_g['Email_Paroki'] ?>" placeholder="">
                </div>    
                <div class=""></div> 
                <span class="float-right">  
                    <a class="btn btn-danger" href="<?= base_url()?>master_data/data_gereja_c">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button> 
                </span> 
            </form>
            <?php endforeach ; ?>
        </div>
        <div class="col"></div>
    </div>
</div>