    <div class="page-content d-flex align-items-stretch">
      <nav class="side-navbar" style="font-size:18px">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h4">PKKS</h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Menu :</span>
        <ul class="list-unstyled">
          <li><a href="<?= base_url() ?>/home"> <i class="icon-home"></i>Home </a></li>
          <li><a href="#viewDataDropDown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Master Data </a>
            <ul id="viewDataDropDown" class="collapse list-unstyled">
              <li><a href="<?= base_url() ?>master_data/data_gereja_c">Data Gereja</a></li>
              <li><a href="<?= base_url() ?>master_data/data_anggota_c">Data Anggota</a></li>
              <li><a href="<?= base_url() ?>master_data/data_barang_c">Data Barang</a></li>
              <li><a href="<?= base_url() ?>master_data/nilai_iuran_c">Nilai Iuran</a></li>
              <li><a href="<?= base_url() ?>master_data/nilai_klaim_c">Nilai Klaim</a></li>
              <li><a href="<?= base_url() ?>master_data/inventaris_c">Nilai Inventaris</a></li>
              <li><a href="<?= base_url() ?>master_data/data_biaya_c">Biaya</a></li>
              <li><a href="<?= base_url() ?>master_data/data_bank_c">Bank</a></li>
              <li><a href="<?= base_url() ?>master_data/kas_c">Kas</a></li>
            </ul>
          </li>
          <li><a href="#transaksidtDropDown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Data Transaksi </a>
            <ul id="transaksidtDropDown" class="collapse list-unstyled">
              <li><a href="<?= base_url() ?>transaksi/t_iuran_anggota_c/detail_t">Iuran Anggota</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_klaim_anggota_c">Klaim Anggota</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_barang_masuk_c/detail_t">Data Barang Masuk</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_barang_keluar_c/detail_t">Data Barang Keluar</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_inventaris_masuk_c/detail_t">Invetaris Masuk</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_inventaris_keluar_c/detail_t">Inventaris Keluar</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_biaya_c">Biaya</a></li>
              <li><a href="<?= base_url() ?>transaksi/t_bank_c">Bank</a></li>
            </ul>
          </li>
          <?php if ($this->session->userdata('level') === '1' or $this->session->userdata('level') === '2') : ?>
            <li><a href="<?= base_url() ?>/user_c"> <i class="icon-interface-windows"></i>User </a></li>
            <li><a href="<?= base_url() ?>/history_c"> <i class="icon-interface-windows"></i>History </a></li>
          <?php endif; ?>
        </ul>
      </nav>
      <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
          <div class="container-fluid">
            <h2 class="no-margin-bottom"><?php echo $judul; ?></h2>
          </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
          <div class="container-fluid">
            <div class="row bg-white has-shadow">