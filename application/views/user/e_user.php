<div class="container p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col"></div>
        <div class="col-10 formulir">
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif ; ?>
            <?php foreach( $user as $us) :?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="kode_u">Kode User</label>
                    <input type="text" name="kode_u" class="form-control" id="k_user" readonly  placeholder="" value="<?= $us['Kode_User'] ?>">
                </div>
                <div class="form-group">
                    <label for="pass_u">Password User</label>
                    <input type="text" name="pass_u" class="form-control" id="pass_user" placeholder="" value="<?= $us['Password_User'] ?>">
                </div>
                <div class="form-group">
                    <label for="n_user">Nama User</label>
                    <input type="text" name="nama_u" class="form-control" id="nama_u" placeholder="" value="<?= $us['Nama_User'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat_u">Alamat User</label>
                    <input type="text" name="alamat_u" class="form-control" id="alamat_u" placeholder="" value="<?= $us['Alamat_User'] ?>">
                </div>
                <div class="form-group">
                    <label for="jabatan_u">Jabatan User</label>
                    <input type="text" name="jabatan_u" class="form-control" id="jabatan_u" placeholder="" value="<?= $us['Jabatan_User'] ?>">
                </div>
                <div class="form-group">
                    <label for="kewenangan_u">Kewenangan User</label>
                    <select class="form-control" id="kewenangan_u" name="kewenangan_u">
                    <option value="1" <?php if($us['Kewenangan_User'] == '1') echo 'selected' ; ?>>Super Admin</option>
                    <option value="2" <?php if($us['Kewenangan_User'] == '2') echo 'selected' ; ?>>Admin</option>
                    <option value="3" <?php if($us['Kewenangan_User'] == '3') echo 'selected' ; ?>>Tamu</option>
                    </select>
                </div>
                <span class="float-right">  
                    <a class="btn btn-danger" href="<?= base_url()?>user_c">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>  
                </span>
            </form>
            <?php endforeach ; ?>
        </div>
        <div class="col"></div>
    </div>
</div>  