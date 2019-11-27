<?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
  <a class="btn btn-primary mb-3" href="<?= base_url() ?>master_data/Data_Biaya_C/inputdata"><i class="fa fa-plus"></i>Tambah Data</a>
<?php endif; ?>

<form class="form-inline ml-auto mb-3" action="<?= base_url() ?>master_data/Data_Biaya_C/cariData" method="post">
  <input type="text" class="form-control" name="icari" placeholder="Kode Biaya / Nama Biaya">
  <button class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col">Kode Biaya</th>
      <th scope="col">Nama Biaya</th>
      <th scope="col">Keterangan</th>
      <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
        <th scope="col" style="width: 160px;">Aksi</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody style="font-size:16px;">
    <?php $i = 1; ?>
    <?php foreach ($data_biaya as $bia) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= $bia['Kode_Biaya'] ?></td>
        <td><?= $bia['Nama_Biaya'] ?></td>
        <td><?= $bia['Keterangan'] ?></td>
        <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
          <td>
            <?php echo anchor(
                  'master_data/Data_Biaya_C/editData/' . $bia['Kode_Biaya'],
                  '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>'
                ) ?>

            <span onclick="javascript : return confirm('Anda yakin hapus ?')">
              <?php echo anchor(
                    'master_data/Data_Biaya_C/hapusData/' . $bia['Kode_Biaya'],
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
<?php if (count($data_biaya) == 0) { ?>
  <p class="col text-center">
    Data Tidak ada !!!
  </p>
<?php } ?>