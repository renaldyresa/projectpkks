<?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
    <a class="btn btn-primary mb-3" href="<?= base_url() ?>transaksi/t_iuran_anggota_c"><i class="fa fa-plus"></i>Tambah Transaksi</a>
<?php endif; ?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" style="width: 40px;">No.</th>
            <th scope="col">Kode Transaksi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Wilayah</th>
            <th scope="col">Lingkungan</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Keterangan</th>
            <th scope="col" style="width: 160px;">Aksi</th>
        </tr>
    </thead>
    <tbody style="font-size:16px;">

        <?php $i = 1; ?>
        <?php foreach ($data as $dt) : ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $dt['Id_Detail'] ?></td>
                <td><?= date("d-m-Y", strtotime($dt['Tanggal'])) ?></td>
                <td><?= $dt['Wilayah'] ?></td>
                <td><?= $dt['Lingkungan'] ?></td>
                <td><?= $dt['Total_Pembayaran'] ?></td>
                <td><?= $dt['Keterangan'] ?></td>
                <td>
                    <?php echo anchor(
                            'transaksi/T_Iuran_Anggota_C/transaksi_detail/' . $dt['Id_Detail'],
                            '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>'
                        ) ?>
                </td>
            </tr>
        <?php $i = $i + 1;
        endforeach; ?>

    </tbody>
</table>
<?php if (count($data) == 0) { ?>
    <p class="col text-center">
        Data Tidak ada !!!
    </p>
<?php } ?>