<form class="form-inline ml-auto mb-3" action="<?= base_url()?>History_C/cariData" method="post">
    <label class="ml-5 mr-2">Kode User :</label>
    <input type="text" class="form-control" name="icarikode" placeholder="search">
    <label class="ml-5 mr-2">Keterangan :</label>
    <input type="text" class="form-control" name="icariket" placeholder="search">
    <label class="ml-5 mr-2">Waktu :</label>
    <input type="text" class="form-control" name="icariwak" placeholder="search">
    <button class="btn btn-outline-info" type="submit"><i class="fa fa-search"></i></button>
</form>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col">Kode User</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Waktu</th>
    </tr>
  </thead>
  <tbody style="font-size:16px;">
    <?php $i = 1 ;?>
    <?php foreach( $data as $dt) :?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $dt['Kode_User'] ?></td>
      <td><?= $dt['Keterangan'] ?></td>
      <td><?= $dt['Waktu'] ?></td>
    </tr>
    <?php $i = $i + 1 ;endforeach ;?>
  </tbody>
</table>
<?php if(count($data)==0){ ?>
  <p class="col text-center">    
    Data Tidak ada !!!
  </p>
<?php } ?>