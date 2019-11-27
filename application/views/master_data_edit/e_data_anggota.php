<div class="container p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col"></div>
        <div class="col-10 formulir">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php foreach ($data_anggota as $dt_a) : ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="no_kkk">Nomor KKK(Kartu Keluarga Katolik)</label>
                        <input type="text" name="no_kkk" class="form-control" id="no_kkk" value="<?= $dt_a['No_KKK'] ?>" readonly placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control" value="<?= $dt_a['Tanggal'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Baptis</label>
                        <input type="text" name="n_baptis" class="form-control" id="nama_baptis" value="<?= $dt_a['Nama_Baptis'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Nama Lahir</label>
                        <input type="text" name="n_lahir" class="form-control" id="nama_lahir" value="<?= $dt_a['Nama_Lahir'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Keluarga</label>
                        <input type="number" name="j_kk" class="form-control" id="j_kk" value="<?= $dt_a['Jumlah_KK'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $dt_a['Alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" max="3000-12-31" min="1000-01-01" class="form-control" value="<?= $dt_a['Tanggal_Lahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="hub_keluarga">Hubungan Keluarga</label>
                        <input type="text" name="hub_kel" class="form-control" id="hub_keluarga" value="<?= $dt_a['Hub_Keluarga'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label><br>
                        <label class="radio-inline"><input type="radio" value="Laki-Laki" name="j_k" <?php if ($dt_a['Jenis_Kelamin'] == "Laki-Laki") {
                                                                                                                echo 'checked="checked"';
                                                                                                            }  ?>>Laki-Laki</label>
                        <label class="radio-inline"><input type="radio" value="Perempuan" name="j_k" <?php if ($dt_a['Jenis_Kelamin'] == "Perempuan") {
                                                                                                                echo 'checked="checked"';
                                                                                                            }  ?>>Perempuan</label>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Status</label><br>
                        <label class="radio-inline"><input type="radio" value="Hidup" name="status" <?php if ($dt_a['Status'] == "Hidup") {
                                                                                                            echo 'checked="checked"';
                                                                                                        }  ?> onclick="Check(0)">Hidup</label>
                        <label class="radio-inline"><input type="radio" value="Meninggal" name="status" <?php if ($dt_a['Status'] == "Meninggal") {
                                                                                                                echo 'checked="checked"';
                                                                                                            } ?> onclick="Check(1)">Meninggal</label>
                    </div>
                    <script>
                        function Check(x = 1) {
                            if (x == 1) document.getElementById('tgm').style.display = 'block';
                            else document.getElementById('tgm').style.display = 'none';
                            return;
                        }
                    </script>

                    <div class="form-group" id='tgm' style="display : none;">
                        <label>Tanggal Meninggal</label>
                        <input type="date" name="tgl_men" class="form-control" value="<?= $dt_a['Tanggal_Meninggal'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Status Keanggotaan</label><br>
                        <label class="radio-inline"><input type="radio" value="Active" name="status_k" <?php if ($dt_a['Status_Keanggotaan'] == "Active") {
                                                                                                                echo 'checked="checked"';
                                                                                                            } ?>>Active</label>
                        <label class="radio-inline"><input type="radio" value="Non Active" name="status_k" <?php if ($dt_a['Status_Keanggotaan'] == "Non Active") {
                                                                                                                    echo 'checked="checked"';
                                                                                                                } ?>>Non Active</label>
                    </div>
                    <span class="float-right">
                        <a class="btn btn-danger" href="<?= base_url() ?>master_data/data_anggota_c">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </span>
                </form>
            <?php endforeach; ?>
        </div>
        <div class="col"></div>
    </div>
</div>