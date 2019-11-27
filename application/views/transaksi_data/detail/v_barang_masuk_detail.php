<div class="pb-3">
    Tanggal : <?= date("d-m-Y", strtotime($data['0']['Tanggal'])) ?>
</div>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" style="width: 40px;">No.</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Total</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody style="font-size:16px;">

        <?php $i = 1;
        $total = 0 ?>
        <?php foreach ($data as $dt) : ?>
            <?php $ttl = $dt['Jumlah'] *  $dt['Harga_Beli']; ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $dt['Kode_Barang'] ?></td>
                <td><?= $dt['Nama_Barang'] ?></td>
                <td><?= $dt['Jumlah'] ?></td>
                <td><?= $dt['Harga_Beli'] ?></td>
                <td><?= $ttl ?></td>
                <td><?= $dt['Keterangan'] ?></td>
            </tr>
        <?php $i = $i + 1;
            $total += $ttl;
        endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>Total Semua </td>
            <td><?= $total ?></td>
        </tr>
    </tfoot>
</table>
<div class="pl-5 pt-5">
    <a class="btn btn-secondary btn-sm " href="<?= base_url() ?>transaksi/t_barang_masuk_c/detail_t">Back</a>
</div>