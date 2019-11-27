<div class="container p-3 mb-2 bg-light text-dark">
    <div class="row">
        <div class="col"></div>
        <div class="col-10 formulir">
        <?php if(validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif ; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label >Tanggal</label>
                    <input type="date" name="tgl" value="<?php echo date("Y-m-d");?>" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="nama_b">Nama Bank</label>
                    <input type="text" name="nama_b" class="form-control" id="nama_b"   placeholder="">
                </div>
                <div class="form-group">
                    <label for="no_rek">No Rekening</label>
                    <input type="text" name="no_rek" class="form-control" id="no_rek" placeholder="">
                </div>
                <div class="form-group">
                    <label for="j_rek">Jenis Rekening</label>
                    <input type="text" name="j_rek" class="form-control" id="j_rek" placeholder="">
                </div>
                <div class="form-group">
                    <label for="kredit">Kredit</label>
                    <input type="text" name="kredit" class="form-control" id="kredit" placeholder="">
                </div>
                <div class="form-group">
                    <label for="debit">Debit</label>
                    <input type="text" name="debit" class="form-control" id="debit" placeholder="">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="">
                </div>
                <div class=""></div> 
                <span class="float-right">  
                    <a class="btn btn-danger" href="<?= base_url()?>master_data/data_bank_c">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>  
                </span>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>