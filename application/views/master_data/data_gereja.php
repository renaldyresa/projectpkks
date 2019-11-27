<?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
  <a class="btn btn-primary mb-3" href="<?= base_url() ?>master_data/Data_Gereja_C/inputdata"><i class="fa fa-plus"></i>Tambah Data</a>
<?php endif; ?>

<form class="form-inline ml-auto mb-3" action="<?= base_url() ?>master_data/Data_Gereja_C/cariData" method="post">
  <input type="text" class="form-control" name="icari" placeholder="Kode PKKS / Nama Keuskupan">
  <button class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col">Kode PKKS</th>
      <th scope="col">Nama Keuskupan</th>
      <th scope="col">Nama Paroki</th>
      <th scope="col">No Telpon Paroki</th>
      <th scope="col" style="width: 160px;">Aksi</th>
    </tr>
  </thead>
  <tbody style="font-size:16px;">
    <?php $i = 1; ?>
    <?php foreach ($data_gereja as $dt_g) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= $dt_g['Kode_PKKS_Keuskupan'] ?></td>
        <td><?= $dt_g['Nama_Keuskupan'] ?></td>
        <td><?= $dt_g['Nama_Paroki'] ?></td>
        <td><?= $dt_g['No_Telpon_Paroki'] ?></td>
        <td>
          <?php echo anchor(
              'master_data/Data_Gereja_C/detail/' . $dt_g['Kode_PKKS_Keuskupan'],
              '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>'
            ) ?>
          <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
            <?php echo anchor(
                  'master_data/Data_Gereja_C/editData/' . $dt_g['Kode_PKKS_Keuskupan'],
                  '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>'
                ) ?>

            <span onclick="javascript : return confirm('Anda yakin hapus ?')">
              <?php echo anchor(
                    'master_data/Data_Gereja_C/hapusData/' . $dt_g['Kode_PKKS_Keuskupan'],
                    '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'
                  ) ?>
            </span>
          <?php endif; ?>
        </td>
      </tr>
    <?php $i = $i + 1;
    endforeach; ?>
  </tbody>
</table>
<?php if (count($data_gereja) == 0) { ?>
  <p class="col text-center">
    Data Tidak ada !!!
  </p>
<?php } ?>