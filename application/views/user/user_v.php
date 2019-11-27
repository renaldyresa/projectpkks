<?php if($this->session->userdata('level')==='1'):?>
<a class="btn btn-primary mb-3" href="<?= base_url()?>User_C/inputdata">Tambah User</a>
<?php endif;?>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="width: 40px;">No.</th>
      <th scope="col">Nama User</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Kewenagan</th>
      <?php if($this->session->userdata('level')==='1'):?>
      <th scope="col" style="width: 160px;">Aksi</th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody style="font-size:16px;">
    <?php $i = 1 ;?>
    <?php foreach( $user as $us) :?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $us['Nama_User'] ?></td>
      <td><?= $us['Alamat_User'] ?></td>
      <td><?= $us['Jabatan_User'] ?></td>
      <td><?php if ($us['Kewenangan_User']=='1') echo 'Super Admin'; elseif($us['Kewenangan_User']=='2') echo 'Admin'; else echo 'Tamu' ?></td>
      <?php if($this->session->userdata('level')==='1'):?>
      <td>  
        <?php echo anchor('User_C/editData/'.$us['Kode_User'],
          '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>')?>
        
        <span onclick="javascript : return confirm('Anda yakin hapus ?')">
        <?php echo anchor('user_c/hapusData/'.$us['Kode_User'],
          '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>')?>
        </span>
      </td>
      <?php endif;?>
    </tr>
    <?php $i = $i + 1 ;endforeach ;?>
  </tbody>
</table>
