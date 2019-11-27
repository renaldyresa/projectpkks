<?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
  <a class="btn btn-primary mb-3" href="<?= base_url() ?>master_data/Data_Anggota_C/inputdata"><i class="fa fa-plus"></i>Tambah Data</a>
<?php endif; ?>
<form class="form-inline ml-auto mb-3" action="<?= base_url() ?>master_data/Data_Anggota_C/cariData" method="post">
  <input type="text" class="form-control" name="icari" placeholder="Nomor KKK / Nama Lahir">
  <button class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col" style="width: 8%;">Tanggal</th>
      <th scope="col">No KKK</th>
      <th scope="col">Nama Lahir</th>
      <th scope="col" style="width: 15%;">Alamat</th>
      <th scope="col" style="width: 10%;">Status</th>
      <th scope="col" style="width: 15%;">Status Keanggotaan</th>
      <th scope="col" style="width: 160px;">Aksi</th>
    </tr>
  </thead>
  <tbody style="font-size:16px;">

    <?php $i = 1; ?>
    <?php foreach ($data_anggota as $dt_a) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= date("d-m-Y", strtotime($dt_a['Tanggal'])) ?></td>
        <td><?= $dt_a['No_KKK'] ?></td>
        <td><?= $dt_a['Nama_Lahir'] ?></td>
        <td><?= $dt_a['Alamat'] ?></td>
        <td><?= $dt_a['Status'] ?></td>
        <td><?= $dt_a['Status_Keanggotaan'] ?></td>
        <td>
          <?php echo anchor(
              'master_data/Data_Anggota_C/detail/' . $dt_a['No_KKK'],
              '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>'
            ) ?>

          <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>

            <?php echo anchor(
                  'master_data/Data_Anggota_C/editData/' . $dt_a['No_KKK'],
                  '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>'
                ) ?>

            <span onclick="javascript : return confirm('Anda yakin hapus ?')">
              <?php echo anchor(
                    'master_data/Data_Anggota_C/hapusData/' . $dt_a['No_KKK'],
                    '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>'
                  ) ?>

            <?php endif; ?>
            </span>
        </td>
      </tr>
    <?php $i = $i + 1;
    endforeach; ?>

  </tbody>
</table>
<?php if (count($data_anggota) == 0) { ?>
  <p class="col text-center">
    Data Tidak ada !!!
  </p>
<?php } ?>