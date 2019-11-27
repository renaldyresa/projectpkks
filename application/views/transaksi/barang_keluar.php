<div class="" style="width:100%">
    <form action="" method="post">
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">No KKK</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="no_kkk" name="no_kkk" onkeypress="autocom()" autocomplete="off" list="datalist">
                <datalist id="datalist"></datalist>
            </div>

            <button class=" col-sm-0.5 btn btn-primary" type="button" onclick="cari()"><i class="fa fa-search"></i></button>
        </div>
        <div class="form-group row" style="padding-top: 0px">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="nama" readonly>
            </div>
        </div>
        <div class="form-group row" style="padding-top: 0px">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="k_barang" onkeypress="autocom1()" autocomplete="off" list="datalist1">
                <datalist id="datalist1"></datalist>
            </div>
        </div>
        <div class="form-group row" style="padding-top: 0px">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Harga Jual</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="h_jual" value="0">
            </div>
        </div>
        <div class="form-group row" style="padding-top: 0px">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="keterangan">
            </div>
            <button class="col-sm-0.5 btn btn-primary" type="button" onclick="cari1()">Tambah</button>
        </div>
    </form>
    <table class="table" id="tablex">
        <thead class="thead-light">
            <tr>
                <th scope="col">No KKK</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><strong>Total :</strong></td>
                <td id='tt'>0</td>
            </tr>
        </tfoot>
    </table>
    <button class="col-sm-0.5 btn btn-primary float-right mr-5 mt-5" type="button" onclick="mysub()">Selesai</button>

</div>



<script>
    function autocom1() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('transaksi/t_inventaris_keluar_c/Getno_kkk') ?>",
            data: {
                keyword: $("#k_barang").val()
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#datalist1').empty();
                } else if (data.length == 0) {
                    $('#datalist1').empty();
                    $('#datalist1').append('<option>Data Tidak Ada </option>');
                }
                var i = 0;
                $.each(data, function(key, value) {
                    if (data.length > 0) {
                        $('#datalist1').append('<option value=' + value['Kode_Barang'] + ' >' + value['Nama_Barang'] + '</option>');
                    }
                });

            }
        });
    };

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
                } else if (data.length == 0) {
                    $('#datalist').empty();
                    $('#datalist').append('<option>Data Tidak Ada </option>');
                }
                var i = 0;
                $.each(data, function(key, value) {
                    if (data.length > 0) {
                        $('#datalist').append('<option value=' + value['No_KKK'] + ' >' + value['Nama_Lahir'] + '</option>');
                    }
                });

            }
        });
    };
</script>


<script>
    function cari1() {
        var k_bar = document.getElementById("k_barang").value
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_inventaris_keluar_c/cari/') ?>' + k_bar,
            async: true,
            dataType: 'json',
            success: function(data) {
                if (data[0] == null) {
                    alert("Data Kode Barang Tidak ada");
                } else {
                    ch();
                }
            }
        });
    }

    function cari() {
        var kkk = document.getElementById("no_kkk").value
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_barang_keluar_c/cari/') ?>' + kkk,
            async: true,
            dataType: 'json',
            success: function(data) {
                if (data[0] != null)
                    document.getElementById("nama").value = data[0].Nama_Lahir;
                else {
                    alert("Data Tidak ada");
                    document.getElementById("nama").value = "";
                }
            }
        });
    }

    function tambah() {
        var no_kkk = document.getElementById("no_kkk").value
        var nama = document.getElementById("nama").value
        var k_barang = document.getElementById("k_barang").value
        var h_jual = document.getElementById("h_jual").value
        var keterangan = document.getElementById("keterangan").value
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
        Newcell1.innerHTML = no_kkk;
        Newcell2.innerHTML = nama;
        Newcell3.innerHTML = k_barang;
        Newcell4.innerHTML = h_jual;
        Newcell5.innerHTML = keterangan;
        Newcell6.innerHTML = del;
        clearform();
    }

    function clearform() {
        document.getElementById("nama").value = "";
        document.getElementById("k_barang").value = "";
        document.getElementById("h_jual").value = "0";
        document.getElementById("keterangan").value = "";
    }

    function ch() {
        var no_kkk = document.getElementById("no_kkk").value
        var nama = document.getElementById("nama").value
        var k_barang = document.getElementById("k_barang").value
        var h_jual = document.getElementById("h_jual").value
        if (no_kkk != "" &&
            nama != "" &&
            k_barang != "" &&
            h_jual != "") {
            tambah();
            total();
        } else alert("Pastikan Semua Data Terisi")
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
                sumVal += parseInt(table.rows[i].cells[3].innerHTML);
            } catch (err) {}
        }
        document.getElementById("tt").innerHTML = sumVal;
    }

    function loadview() {
        location.href = "<?= base_url('transaksi/t_barang_keluar_c/detail_t') ?>";
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

    function sub() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_barang_keluar_c/tambahdetail') ?>',
            data: {
                Id_Detail: dt_id,
            },
            dataType: 'json'
        });
    }


    function getiddetail() {
        let id;
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_barang_keluar_c/getiddetail/') ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                id = data[0].Id_Detail;
            }
        });
        return id;
    }

    var dt_id = null;

    function myfun() {
        var table = document.getElementById("tablex")
        var totalRows = table.rows.length;
        for (var i = 1; i < totalRows - 1; i++) {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/t_barang_keluar_c/tambahdata/') ?>',
                async: true,
                data: {
                    no_kkk: table.rows[i].cells[0].innerHTML,
                    k_barang: table.rows[i].cells[2].innerHTML,
                    h_jual: table.rows[i].cells[3].innerHTML,
                    keterangan: table.rows[i].cells[4].innerHTML,
                    id_d: dt_id
                },
                dataType: 'json',
                success: function(data) {}
            });
        }
    }
    window.onload = function() {
        var id_max = getiddetail();
        if (id_max == null) {
            dt_id = 1;
        } else dt_id = parseInt(id_max) + 1;
    };
</script>