<div class="container">
    <div class="content-wrapper">
        <section>
            <h4><strong>Detail Data Anggota</strong></h4>
            <?php foreach ($data_anggota as $dt_a) : ?>
                <table class="table">
                    <tr>
                        <td>Tanggal</td>
                        <td style="width: 50%;"><?= date("d-m-Y", strtotime($dt_a['Tanggal'])) ?></td>
                    </tr>
                    <tr>
                        <td>Nomor KKK</td>
                        <td style="width: 50%;"><?= $dt_a['No_KKK'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Baptis</td>
                        <td style="width: 50%;"><?= $dt_a['Nama_Baptis'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lahir</td>
                        <td style="width: 50%;"><?= $dt_a['Nama_Lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Keluarga</td>
                        <td style="width: 50%;"><?= $dt_a['Jumlah_KK'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td style="width: 50%;"><?= $dt_a['Alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td style="width: 50%;"><?= date("d-m-Y", strtotime($dt_a['Tanggal_Lahir'])) ?></td>
                    </tr>
                    <tr>
                        <td>Hubungan Keluarga</td>
                        <td style="width: 50%;"><?= $dt_a['Hub_Keluarga'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td style="width: 50%;"><?= $dt_a['Jenis_Kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="width: 50%;"><?= $dt_a['Status'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Meninggal</td>
                        <td style="width: 50%;"><?php if ($dt_a['Tanggal_Meninggal'] == "0000-00-00") {
                                                        echo "-";
                                                    } else {
                                                        echo date("d-m-Y", strtotime($dt_a['Tanggal_Meninggal']));
                                                    }    ?></td>
                    </tr>
                    <tr>
                        <td>Status Keanggotaan</td>
                        <td style="width: 50%;"><?= $dt_a['Status_Keanggotaan'] ?></td>
                    </tr>
                </table>
                <span class="float-right">
                <?php endforeach; ?>
                <a class="btn btn-secondary btn-sm" href="<?= base_url() ?>master_data/data_anggota_c">Back</a>

                <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
                    <?php echo anchor(
                            'master_data/Data_Anggota_C/editData/' . $dt_a['No_KKK'],
                            '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit">Edit</i></button>'
                        ) ?>

                    <span onclick="javascript : return confirm('Anda yakin hapus ?')">
                        <?php echo anchor(
                                'master_data/Data_Anggota_C/hapusData/' . $dt_a['No_KKK'],
                                '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash">Hapus</i></button>'
                            ) ?>
                    </span>
                <?php endif; ?>
                </span>
        </section>
    </div>
</div>