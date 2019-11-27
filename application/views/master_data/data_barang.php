<?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
  <a class="btn btn-primary mb-3" href="<?= base_url() ?>master_data/Data_Barang_C/inputdata"><i class="fa fa-plus"></i>Tambah Data</a>
<?php endif; ?>

<form class="form-inline ml-auto mb-3" action="<?= base_url() ?>master_data/Data_Barang_C/cariData" method="post">
  <input type="text" class="form-control" name="icari" placeholder="Kode Barang / Nama Barang">
  <button class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Keterangan</th>
      <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
        <th scope="col" style="width: 120px;">Aksi</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody style="font-size:16px;">
    <?php $i = 1; ?>
    <?php foreach ($data_barang as $dt_b) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= $dt_b['Kode_Barang'] ?></td>
        <td><?= $dt_b['Nama_Barang'] ?></td>
        <td>Rp. <?php echo number_format($dt_b['Harga_Jual'], 2, ',', '.') ?></td>
        <td><?= $dt_b['Keterangan'] ?></td>
        <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
          <td>
            <?php echo anchor(
                  'master_data/Data_Barang_C/editData/' . $dt_b['Kode_Barang'],
                  '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>'
                ) ?>

            <span onclick="javascript : return confirm('Anda yakin hapus ?')">
              <?php echo anchor(
                    'master_data/Data_Barang_C/hapusData/' . $dt_b['Kode_Barang'],
                    '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'
                  ) ?>
            </span>
          </td>
        <?php endif; ?>
      </tr>
    <?php $i = $i + 1;
    endforeach; ?>
  </tbody>
</table>
<?php if (count($data_barang) == 0) { ?>
  <p class="col text-center">
    Data Tidak ada !!!
  </p>
<?php } ?>