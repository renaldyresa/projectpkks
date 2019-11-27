<div class="pb-3">
    Tanggal : <?= date("d-m-Y", strtotime($data['0']['Tanggal'])) ?>
</div>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" style="width: 40px;">No.</th>
            <th scope="col">No KKK</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody style="font-size:16px;">

        <?php $i = 1;
        $total = 0 ?>
        <?php foreach ($data as $dt) : ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $dt['No_KKK'] ?></td>
                <td><?= $dt['Kode_Barang'] ?></td>
                <td><?= $dt['Nama_Barang'] ?></td>
                <td><?= $dt['Harga_Jual'] ?></td>
                <td><?= $dt['Keterangan'] ?></td>
            </tr>
        <?php $i = $i + 1;
            $total += $dt['Harga_Jual'];
        endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Total :</td>
            <td><?= $total ?></td>
        </tr>
    </tfoot>
</table>
<div class="pl-5 pt-5">
    <a class="btn btn-secondary btn-sm " href="<?= base_url() ?>transaksi/t_barang_keluar_c/detail_t">Back</a>
</div>