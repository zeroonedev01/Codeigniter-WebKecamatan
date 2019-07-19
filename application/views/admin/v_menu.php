<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!--Counter Inbox-->
<!--     <?php
$query = $this->db->query("SELECT * FROM tb_inbox WHERE status='1'");
$query2 = $this->db->query("SELECT * FROM tb_komentar WHERE status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menu Utama</li>
      <li class="<?php if ($this->uri->segment(2) == "dashboard") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/dashboard' ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "profil" || $this->uri->segment(2) == "sambutan" || $this->uri->segment(2) == "visimisi" || $this->uri->segment(2) == "struktur" || $this->uri->segment(2) == "pegawai" || $this->uri->segment(2) == "desa") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Profil</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'sambutan' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/sambutan' ?>"><i class="fa fa-user"></i> Sambutan Camat</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'visimisi' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/visimisi' ?>"><i class="fa fa-thumb-tack"></i> Visi dan Misi</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "struktur") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/struktur' ?>"><i class="fa fa-sitemap"></i> Strukutur Organisasi</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "pegawai") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/pegawai' ?>"><i class="fa fa-users"></i> Profil Pegawai</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "desa") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/desa' ?>"><i class="fa fa-flag"></i> Desa</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "berita" || $this->uri->segment(2) == "kategori") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-newspaper-o"></i>
          <span>Berita</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "berita" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin/berita' ?>"><i class="fa fa-list"></i> List Berita</a></li>
          <li class="<?php if ($this->uri->segment(3) == "add_berita") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/berita/add_berita' ?>"><i class="fa fa-thumb-tack"></i> Post Berita</a></li>
          <li class="<?php if ($this->uri->segment(2) == "kategori") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/kategori' ?>"><i class="fa fa-wrench"></i> Kategori</a></li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "potensi") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-map-signs"></i>
          <span>Potensi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "potensi" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin/potensi' ?>"><i class="fa fa-list"></i> List Potensi</a></li>
          <li class="<?php if ($this->uri->segment(3) == "add_potensi") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/potensi/add_potensi' ?>"><i class="fa fa-globe"></i> Post Potensi</a></li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "identitas" || $this->uri->segment(2) == "waktu" || $this->uri->segment(2) == "slider" || $this->uri->segment(2) == "socmed") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-fort-awesome"></i>
          <span>Identitas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "identitas") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/identitas' ?>"><i class="fa fa-list"></i>Identitas Kecamatan</a></li>
          <li class="<?php if ($this->uri->segment(2) == "waktu") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/waktu' ?>"><i class="fa fa-clock-o"></i>Waktu Buka</a></li>
          <li class="<?php if ($this->uri->segment(2) == "slider") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/slider' ?>"><i class="fa fa-image"></i>Slider</a></li>
          <li class="<?php if ($this->uri->segment(2) == "socmed") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/socmed' ?>"><i class="fa fa-link"></i>Social Media</a></li>


        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "denahlayanan" || $this->uri->segment(2) == "alurlayanan" || $this->uri->segment(2) == "jenispelayanan") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-server"></i>
          <span>Layanan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "alurlayanan") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/alurlayanan' ?>"><i class="fa fa-hand-o-right"></i>Alur Layanan</a></li>
          <li class="<?php if ($this->uri->segment(2) == "denahlayanan") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/denahlayanan' ?>"><i class="fa fa-street-view"></i>Denah Layanan</a></li>
          <li class="<?php if ($this->uri->segment(2) == "jenispelayanan") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/jenispelayanan' ?>"><i class="fa fa-tasks"></i>Jenis Layanan</a></li>
        </ul>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "agenda") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/agenda' ?>">
          <i class="fa fa-calendar"></i> <span>Agenda</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(2) == "pengumuman") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/pengumuman' ?>">
          <i class="fa fa-volume-up"></i> <span>Pengumuman</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="header">Media</li>
      <li class="<?php if ($this->uri->segment(2) == "files") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/files' ?>">
          <i class="fa fa-download"></i> <span>Download</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "album" || $this->uri->segment(2) == "galeri" || $this->uri->segment(2) == "instagram") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-camera"></i>
          <span>Gallery</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "album") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/album' ?>"><i class="fa fa-clone"></i> Album</a></li>
          <li class="<?php if ($this->uri->segment(2) == "galeri") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/galeri' ?>"><i class="fa fa-picture-o"></i> Photos</a></li>
           <li class="<?php if ($this->uri->segment(2) == "instagram") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/instagram' ?>"><i class="fa fa-instagram"></i>Instagram</a></li>
        </ul>
      </li>
      <li class="header">User</li>
      <li class="<?php if ($this->uri->segment(2) == "inbox") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/inbox' ?>">
          <i class="fa fa-envelope"></i> <span>Inbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo $jum_pesan; ?></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "komentar") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/komentar' ?>">
          <i class="fa fa-comments"></i> <span>Komentar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo $jum_comment; ?></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(2) == "pengguna") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin/pengguna' ?>">
          <i class="fa fa-users"></i> <span>Pengguna</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="header">Log Out</li>
      <li>
        <a href="<?php echo base_url() . 'admin/login/logout' ?>">
          <i class="fa fa-sign-out"></i> <span>Sign Out</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>