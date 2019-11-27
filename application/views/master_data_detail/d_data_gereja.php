<div class="container">
    <div class="content-wrapper">
        <section>
            <h4><strong>Detail Data Gereja</strong></h4>
            <?php foreach( $data_gereja as $dt_g) :?>
            <table class="table">
                <tr>
                    <td>Kode PKKS Keuskupan</td>
                    <td style="width: 50%;"><?= $dt_g['Kode_PKKS_Keuskupan'] ?></td>
                </tr>
                <tr>
                    <td>Nama Keuskupan</td>
                    <td style="width: 50%;"><?= $dt_g['Nama_Keuskupan'] ?></td>
                </tr>
                <tr>
                    <td>Kode PKKS Keuskupan</td>
                    <td style="width: 50%;"><?= $dt_g['Kode_PKKS_Paroki'] ?></td>
                </tr>
                <tr>
                    <td>Nama Paroki</td>
                    <td style="width: 50%;"><?= $dt_g['Nama_Paroki'] ?></td>
                </tr>
                <tr>
                    <td>Alamat Paroki</td>
                    <td style="width: 50%;"><?= $dt_g['Alamat_Paroki'] ?></td>
                </tr>
                <tr>
                    <td>Nomor Telpon Paroki</td>
                    <td style="width: 50%;"><?= $dt_g['No_Telpon_Paroki'] ?></td>
                </tr>
                <tr>
                    <td>Email Paroki</td>
                    <td style="width: 50%;"><?= $dt_g['Email_Paroki'] ?></td>
                </tr>
            </table>
            <span class="float-right">  
                <?php endforeach ; ?>
                <a class="btn btn-secondary btn-sm" href="<?= base_url()?>master_data/data_gereja_c">Back</a>
                <?php if($this->session->userdata('level')==='1' or $this->session->userdata('level')==='2'):?>
                <?php echo anchor('master_data/Data_Gereja_C/editData/'.$dt_g['Kode_PKKS_Keuskupan'],
                '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit">Edit</i></button>')?>
                
                <span onclick="javascript : return confirm('Anda yakin hapus ?')">
                <?php echo anchor('master_data/Data_Gereja_C/hapusData/'.$dt_g['Kode_PKKS_Keuskupan'],
                '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash">Hapus</i></button>')?>
                </span>
                <?php endif;?>
            </span>
        </section>
    </div>
</div>