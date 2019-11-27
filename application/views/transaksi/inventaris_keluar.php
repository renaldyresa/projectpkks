<div class="" style="width:100%">
    <form action="javascript:ch()" method="post">
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="k_barang" name="k_barang" onkeypress="autocom()" autocomplete="off" list="datalist">
                <datalist id="datalist"><select></select></datalist>
            </div>
            <button class=" col-sm-0.5 btn btn-primary" type="button" onclick="cari()"><i class="fa fa-search"></i></button>
        </div>
        <div class="form-group row" style="padding-top: 0px">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="nama" readonly>
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
            <button class="col-sm-0.5 btn btn-primary" type="submit">Tambah</button>
        </div>
    </form>
    <table class="table" id="tablex">
        <thead class="thead-light">
            <tr>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td><strong>Total :</strong></td>
                <td id='tt'>0</td>
            </tr>
        </tfoot>
    </table>
    <button class="col-sm-0.5 btn btn-primary float-right mr-5 mt-5" type="button" onclick="mysub()">Selesai</button>

</div>


<script>
    function autocom() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('transaksi/t_inventaris_keluar_c/Getno_kkk') ?>",
            data: {
                keyword: $("#k_barang").val()
            },
            dataType: "json",
            success: function(data) {
                if (data.length > 0) {
                    $('#datalist').empty();
                } else if (data.length == 0) {
                    $('#datalist').empty();
                }
                var i = 0;
                $.each(data, function(key, value) {
                    if (data.length > 0) {
                        $('#datalist').append('<option value=' + value['Kode_Barang'] + ' > ' + value['Nama_Barang'] + '</option>');
                    }
                });

            }
        });
    };
</script>

<script type="text/javascript">
    function cari() {
        var k_bar = document.getElementById("k_barang").value
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_inventaris_keluar_c/cari/') ?>' + k_bar,
            async: true,
            dataType: 'json',
            success: function(data) {
                if (data[0] != null)
                    document.getElementById("nama").value = data[0].Nama_Barang;
                else {
                    alert("Data Tidak ada");
                    document.getElementById("nama").value = "";
                }
            }
        });
    }

    function tambah() {
        var k_barang = document.getElementById("k_barang").value
        var nama = document.getElementById("nama").value
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
        Newcell1.innerHTML = k_barang;
        Newcell2.innerHTML = nama;
        Newcell3.innerHTML = h_jual;
        Newcell4.innerHTML = keterangan;
        Newcell5.innerHTML = del;
        clearform();
    }

    function clearform() {
        document.getElementById("nama").value = "";
        document.getElementById("h_jual").value = "0";
        document.getElementById("keterangan").value = "";
    }

    function ch() {
        var k_barang = document.getElementById("k_barang").value
        var nama = document.getElementById("nama").value
        var h_jual = document.getElementById("h_jual").value
        if (nama != "" &&
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
                sumVal += parseInt(table.rows[i].cells[2].innerHTML);
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
        location.href = "<?= base_url('transaksi/t_inventaris_keluar_c/detail_t') ?>";
    }

    function test() {
        alert("berhasil");
    }

    function sub() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('transaksi/t_inventaris_keluar_c/tambahdetail') ?>',
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
            url: '<?= base_url('transaksi/t_inventaris_keluar_c/getiddetail/') ?>',
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
                url: '<?= base_url('transaksi/t_inventaris_keluar_c/tambahdata/') ?>',
                async: true,
                data: {
                    k_barang: table.rows[i].cells[0].innerHTML,
                    h_jual: table.rows[i].cells[2].innerHTML,
                    keterangan: table.rows[i].cells[3].innerHTML,
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