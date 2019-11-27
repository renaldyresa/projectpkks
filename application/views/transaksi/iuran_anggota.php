<div class="col-12">
    <form action="javascript:cari()" method="post" style="font-size:18px;" autocomplete="off">
        <div class="from-group mb-3 ml-2" style="width:300px;">
            <div class="form-inline">
                <label for="login-username" class="label-material pb-1">Tanggal :</label>
                <div class="col-sm">
                    <input id="tgl" type="date" name="tgl" class="input-material" value="<?= date("Y-m-d"); ?>" required>
                </div>
            </div>
        </div>
        <div class="from-group mb-3 ml-0">
            <div class="form-inline col-6">
                <label for="wilayah" class="label-material pb-1">wilayah :</label>
                <div class="col-sm ">
                    <input id="wilayah" type="text" name="wilayah" class="input-material" required>
                </div>
                <label for="lingkungan" class="label-material pb-1">Lingkungan :</label>
                <div class="col-sm">
                    <input id="lingkungan" type="text" name="lingkungan" class="input-material" required>
                </div>
            </div>
        </div>
        <div class="from-group mb-3 ml-2" style="width:300px;">
            <div class="form-inline">
                <label for="login-username" class="label-material pb-1">No KKK :</label>
                <div class="col-sm">
                    <input type="text" id="no_kkk" name="no_kkk" class="input-material" autocomplete="off" list="datalist" required>
                    <datalist id="datalist"></datalist>
                </div>
                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </form>
    <table class="table" id="tablex">
        <thead class="thead-light">
            <tr>
                <th scope="col">No KKK</th>
                <th scope="col">Nama Kepala Keluarga</th>
                <th scope="col">Status</th>
                <th scope="col">Jumlah KK</th>
                <th scope="col">Periode</th>
                <th scope="col">Total</th>
                <th scope="col">Sumbangan</th>
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"></td>
                <td><strong>Total :</strong></td>
                <td id='tt'>0</td>
            </tr>
        </tfoot>
    </table>
    <div class="form-group pt-3">
        <label>Keterangan :</label>
        <textarea name="ket" class="form-control" id="ket" rows="3"></textarea>
    </div>
    <button class="col-sm-0.5 btn btn-primary float-right mr-5 mt-5" type="button" onclick="mysub()">Selesai</button>
    <button class="col-sm-0.5 btn btn-secondary float-left ml-5 mt-5" type="button" onclick="loadview()">Back</button>
</div>
<div id="myModal" class="modal fade myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="container mt-3 mb-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_b">No KKK</label>
                        <input type="text" name="no_kkk_i" class="form-control" id="no_kkk_i" readonly placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="no_rek">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kk" class="form-control" id="nama_kk" readonly placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="j_rek">Status Keanggotaan</label>
                        <input type="text" name="status_k" class="form-control" id="status_k" readonly placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="kredit">Jumlah Anggota Keluarga</label>
                        <input type="number" name="j_kk" class="form-control" id="j_kk" readonly placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="debit">Lama Bulan</label>
                        <input type="number" name="l_bln" class="form-control" id="l_bln" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Total Iuran</label>
                        <input type="text" name="t_iuran" class="form-control" id="t_iuran" placeholder="" value="0">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Jumlah Sumbangan Sukarela</label>
                        <input type="text" name="j_ss" class="form-control" id="j_ss" placeholder="" value="0">
                    </div>
                    <div class=""></div>
                    <span class="float-right">
                        <button type="button" class="btn btn-danger" onclick="cancel()">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="tambah()">Save changes</button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function autocom() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('transaksi/t_barang_keluar_c/Getno_kkk') ?>",
            data: {
                keyword: $("#no_kkk").val()
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#datalist').empty();
                }
                $.each(data, function(key, value) {
                    if (data.length > 0) {
                        $('#datalist').append('<option value=' + value['No_KKK'] + ' >' + value['Nama_Lahir'] + '</option>');
                    }
                });

            }
        });
    };

    function cancel() {
        $('#myModal').modal('hide');
    }

    function cari() {
        var kkk = document.getElementById("no_kkk").value;
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_iuran_anggota_c/cari/') ?>' + kkk,
            async: true,
            dataType: 'json',
            success: function(data) {
                if (data[0] != null) {
                    $('#myModal').modal('show');
                    document.getElementById("no_kkk_i").value = data[0].No_KKK;
                    document.getElementById("nama_kk").value = data[0].Nama_Lahir;
                    document.getElementById("status_k").value = data[0].Status_Keanggotaan;
                    document.getElementById("j_kk").value = data[0].Jumlah_KK;
                } else {
                    alert("Data Tidak Ada")
                    document.getElementById("no_kkk").value = "";
                }
            }
        });
    }

    function tambah() {
        var no_kkk = document.getElementById("no_kkk_i").value
        var nama = document.getElementById("nama_kk").value
        var status = document.getElementById("status_k").value
        var jum_kk = document.getElementById("j_kk").value
        var l_bln = document.getElementById("l_bln").value
        var t_iuran = document.getElementById("t_iuran").value
        var j_ss = document.getElementById("j_ss").value
        var t_pem = parseInt(t_iuran) + parseInt(j_ss)
        var del = "<td>" +
            "<button type='button'" +
            "onclick='productDelete(this);total();' " +
            "class='btn btn-danger'>" +
            "<i class='fa fa-trash' />" +
            "</button>" +
            "</td>";
        var MyTable = document.getElementById("tablex");
        var NewRow = MyTable.insertRow(document.getElementById("tablex").rows.length - 1);
        var Newcell1 = NewRow.insertCell(0);
        var Newcell2 = NewRow.insertCell(1);
        var Newcell3 = NewRow.insertCell(2);
        var Newcell4 = NewRow.insertCell(3);
        var Newcell5 = NewRow.insertCell(4);
        var Newcell6 = NewRow.insertCell(5);
        var Newcell7 = NewRow.insertCell(6);
        var Newcell8 = NewRow.insertCell(7);
        var Newcell9 = NewRow.insertCell(8);
        Newcell1.innerHTML = no_kkk;
        Newcell2.innerHTML = nama;
        Newcell3.innerHTML = status;
        Newcell4.innerHTML = jum_kk;
        Newcell5.innerHTML = l_bln;
        Newcell6.innerHTML = t_iuran;
        Newcell7.innerHTML = j_ss;
        Newcell8.innerHTML = t_pem;
        Newcell9.innerHTML = del;
        total();
        $('#myModal').modal('hide');
    }

    function productDelete(ctl) {
        $(ctl).parents("tr").remove();
    }

    function total() {
        var table = document.getElementById("tablex"),
            sumVal = 0;
        var totalRows = document.getElementById("tablex").rows.length;
        for (var i = 1; i < totalRows; i++) {
            try {
                sumVal += parseInt(table.rows[i].cells[7].innerHTML);
            } catch (err) {}
        }
        document.getElementById("tt").innerHTML = sumVal;
    }

    function mysub() {
        var table = document.getElementById("tablex");
        var totalRows = table.rows.length;
        if (totalRows < 3) {
            alert("Data Belum ada");
        } else {
            sub();
            myfun();
            setTimeout(function() {
                loadview();
            }, 100);

        }
    }

    function loadview() {
        location.href = "<?= base_url('transaksi/t_iuran_anggota_c/detail_t') ?>";
    }

    function sub() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_iuran_anggota_c/tambahdetail') ?>',
            data: {
                Id_Detail: dt_id,
                Tanggal: $("#tgl").val(),
                Wilayah: $("#wilayah").val(),
                Lingkungan: $("#lingkungan").val(),
                T_Pembayaran: document.getElementById("tt").innerHTML,
                Keterangan: $("#ket").val(),
            },
            dataType: 'json'
        });
    }

    function myfun() {
        var table = document.getElementById("tablex")
        var totalRows = table.rows.length;
        for (var i = 1; i < totalRows - 1; i++) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/t_iuran_anggota_c/tambahdata/') ?>',
                async: true,
                data: {
                    no_kkk: table.rows[i].cells[0].innerHTML,
                    j_kk: table.rows[i].cells[3].innerHTML,
                    l_bln: table.rows[i].cells[4].innerHTML,
                    t_iuran: table.rows[i].cells[5].innerHTML,
                    sumbangan: table.rows[i].cells[6].innerHTML,
                    id_d: dt_id
                },
                dataType: 'json',
                success: function(data) {}
            });
        }
    }

    function getiddetail() {
        let id;
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_iuran_anggota_c/getiddetail/') ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                id = data[0].Id_Detail;
            }
        });
        return id;
    }

    var dt_id = null;
    window.onload = function() {
        var id_max = getiddetail();
        if (id_max == null) {
            dt_id = 1;
        } else dt_id = parseInt(id_max) + 1;
    };
</script>

<script>
    var input = document.getElementById('no_kkk');
    var dt = "";
    input.addEventListener('keyup', function() {
        var inp = document.getElementById('no_kkk');
        if (dt.localeCompare(inp) != 0) {
            autocom();
            dt = inp;
        }
    });
</script>