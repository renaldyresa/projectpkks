<?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
  <a class="btn btn-primary mb-3" href="<?= base_url() ?>master_data/Data_Bank_C/inputdata"><i class="fa fa-plus"></i>Tambah Data</a>
<?php endif; ?>

<form class="form-inline ml-auto mb-3" action="<?= base_url() ?>master_data/Data_Bank_C/cariData" method="post">
  <input type="text" class="form-control" name="icari" placeholder="Search">
  <button class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama Bank</th>
      <th scope="col">No Rekening</th>
      <th scope="col">Jenis Rekening</th>
      <th scope="col">Kredit</th>
      <th scope="col">Debit</th>
      <th scope="col">Keterangan</th>
      <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
        <th scope="col" style="width: 120px;">Aksi</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody style="font-size:16px;">
    <?php $i = 1; ?>
    <?php foreach ($data as $dt_b) : ?>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= date("d-m-Y", strtotime($dt_b['Tanggal'])) ?></td>
        <td><?= $dt_b['Nama_Bank'] ?></td>
        <td><?= $dt_b['No_Rekening'] ?></td>
        <td><?= $dt_b['Jenis_Rekening'] ?></td>
        <td><?= $dt_b['Kredit'] ?></td>
        <td><?= $dt_b['Debit'] ?></td>
        <td><?= $dt_b['Keterangan'] ?></td>
        <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
          <td>
            <?php echo anchor(
                  'master_data/Data_Bank_C/editData/' . $dt_b['ID'],
                  '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>'
                ) ?>

            <span onclick="javascript : return confirm('Anda yakin hapus ?')">
              <?php echo anchor(
                    'master_data/Data_Bank_C/hapusData/' . $dt_b['ID'],
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
<?php if (count($data) == 0) { ?>
  <p class="col text-center">
    Data Tidak ada !!!
  </p>
<?php } ?>