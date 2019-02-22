
  <header>
    <!-- /navabr -->
    <nav class="navbar navbar-expand-xl navbar-dark fixed-top bg-danger">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url() ?>">
          <img src="<?php echo base_url() . 'assetss/brand/kalimanah.png' ?>" width="250" height="40" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li <?php echo (($this->uri->segment(1) == "beranda" || $this->uri->segment(1) == "") ? 'class="nav-item active"' : 'class="nav-item"') ?>>
              <a class="nav-link" href="<?php echo base_url() . 'beranda'; ?>">Beranda<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown <?php if ($this->uri->segment(1) == "sambutan" || $this->uri->segment(1) == "strukturorganisasi" || $this->uri->segment(1) == "visimisi" || $this->uri->segment(1) == "profilpegawai" || $this->uri->segment(1) == "desa") {
	echo 'active'
	;
}
?>">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profil
          </a>
          <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a <?php echo (($this->uri->segment(1) == "sambutan") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'sambutan'; ?>">Sambutan Camat</a>
            <a <?php echo (($this->uri->segment(1) == "visimisi") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'visimisi'; ?>">Visi Misi</a>
            <a <?php echo (($this->uri->segment(1) == "strukturorganisasi") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'strukturorganisasi'; ?>">Struktur Organisasi</a>
            <a <?php echo (($this->uri->segment(1) == "profilpegawai") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'profilpegawai'; ?>">Profil Pegawai</a>
            <a <?php echo (($this->uri->segment(1) == "desa") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'desa'; ?>">Desa</a>
          </div>
        </li>
        <li class="nav-item dropdown  <?php if ($this->uri->segment(1) == "berita" || $this->uri->segment(1) == "agenda" || $this->uri->segment(1) == "pengumuman") {
	echo 'active';}?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Berita
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a <?php echo (($this->uri->segment(1) == "berita") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'berita'; ?>">Berita</a>
            <a <?php echo (($this->uri->segment(1) == "agenda") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'agenda'; ?>">Agenda</a>
            <a <?php echo (($this->uri->segment(1) == "pengumuman") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'pengumuman'; ?>">Pengumuman</a>
          </div>
        </li>
        <li class="nav-item dropdown  <?php if ($this->uri->segment(1) == "alurpelayanan" || $this->uri->segment(1) == "denahpelayanan" || $this->uri->segment(1) == "jenispelayanan") {
	echo 'active';}?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pelayanan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a <?php echo (($this->uri->segment(1) == "alurpelayanan") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'alurpelayanan'; ?>">Alur Kegiatan Pelayanan</a>
            <a <?php echo (($this->uri->segment(1) == "denahpelayanan") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'denahpelayanan'; ?>">Denah Jalur Pelayanan</a>
            <a <?php echo (($this->uri->segment(1) == "jenispelayanan") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'jenispelayanan'; ?>">Jenis Pelayanan</a>

          </div>
        </li>
        <li <?php echo (($this->uri->segment(1) == "potensi") ? 'class="nav-item active"' : 'class="nav-item "') ?>>
        <li <?php echo (($this->uri->segment(1) == "potensi") ? 'class="nav-item active"' : 'class="nav-item "') ?>>
          <a class="nav-link" href="<?php echo base_url() . 'potensi'; ?>">Potensi</a>
        </li>
        <li class="nav-item dropdown <?php if ($this->uri->segment(1) == "media" || $this->uri->segment(1) == "download") {
	echo 'active';}?>">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Media
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a <?php echo (($this->uri->segment(1) == "gallery") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?>" href="<?php echo base_url() . 'media/gallery'; ?>">Foto</a>
              <a <?php echo (($this->uri->segment(1) == "download") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'download'; ?>">Download</a>
              </div>
              </li>
              <li <?php echo (($this->uri->segment(1) == "kontak") ? 'class="nav-item active"' : 'class="nav-item "') ?>>
              <a class="nav-link" href="<?php echo base_url() . 'kontak'; ?>">Kontak</a>
              </li>
              </ul>
              <form class="form-inline mt-2 mt-md-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Cari disini..." aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
              </form>
              </div>
              </div>
              </nav>
              </header>