<div class="pb-3">
    Tanggal : <?= date("d-m-Y", strtotime($data['0']['Tanggal'])) ?>
</div>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" style="width: 40px;">No.</th>
            <th scope="col">No KKK</th>
            <th scope="col">Nama Kepala Keluarga</th>
            <th scope="col">Status</th>
            <th scope="col">Jumlah KK</th>
            <th scope="col">Periode</th>
            <th scope="col">Total</th>
            <th scope="col">Sumbangan</th>
            <th scope="col">Total Pembayaran</th>
        </tr>
    </thead>
    <tbody style="font-size:16px;">

        <?php $i = 1;
        $total = 0 ?>
        <?php foreach ($data as $dt) : ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $dt['No_KKK'] ?></td>
                <td><?= $dt['Nama_Lahir'] ?></td>
                <td><?= $dt['Status_Keanggotaan'] ?></td>
                <td><?= $dt['Jumlah_KK'] ?></td>
                <td><?= $dt['Lama_Bulan'] ?></td>
                <td><?= $dt['Total_Iuran'] ?></td>
                <td><?= $dt['Sumbangan'] ?></td>
                <td><?= $dt['Total_Iuran'] + $dt['Sumbangan'] ?></td>
            </tr>
        <?php $i = $i + 1;
            $total += $dt['Total_Iuran'] + $dt['Sumbangan'];
        endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="9"></td>
        </tr>
        <tr>
            <td colspan="7"></td>
            <td>Total :</td>
            <td><?= $total ?></td>
        </tr>
    </tfoot>
</table>
<div class="pl-5 pt-5">
    <a class="btn btn-secondary btn-sm " href="<?= base_url() ?>transaksi/t_iuran_anggota_c/detail_t">Back</a>
</div>