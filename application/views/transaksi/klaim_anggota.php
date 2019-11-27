<form action="" method="post" style="font-size:18px;">
    <div class="from-group mb-3" style="width:300px;">
        <div class="form-inline">
            <label for="login-username" class="label-material pb-1">Tanggal :</label>
            <div class="col-sm">
                <input id="login-username" type="date" name="k_user" required data-msg="Silakan Masukkan Kode User" class="input-material" value="<?php echo date("Y-m-d"); ?>">
            </div>
        </div>
    </div>
    <div class="from-group mb-3">
        <div class="form-inline">
            <label for="wilayah" class="label-material pb-1">wilayah :</label>
            <div class="col-sm">
                <input id="wilayah" type="text" name="k_user" required data-msg="Silakan Masukkan Kode User" class="input-material">
            </div>
            <label for="lingkungan" class="label-material pb-1">Lingkungan :</label>
            <div class="col-sm">
                <input id="lingkungan" type="text" name="k_user" required data-msg="Silakan Masukkan Kode User" class="input-material">
            </div>
        </div>
    </div>
    <form action="">
        <div class="from-group mb-3" style="width:300px;">
            <div class="form-inline">
                <label for="login-username" class="label-material pb-1">No KKK :</label>
                <div class="col-sm">
                    <input id="login-username" type="text" name="k_user" required data-msg="Silakan Masukkan Kode User" class="input-material">
                </div>
                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </form>
</form>