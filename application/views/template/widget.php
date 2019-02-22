<!-- Widget -->
<div class="widgett" >
  <nav style="margin-bottom: 10px;">
    <div class="nav nav-tabs border-danger" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-berita-tab" data-toggle="tab" href="#nav-berita" role="tab" aria-controls="nav-berita" aria-selected="true">Berita</a>
      <a class="nav-item nav-link" id="nav-pengumuman-tab" data-toggle="tab" href="#nav-pengumuman" role="tab" aria-controls="nav-pengumuman" aria-selected="true">Pengumuman</a>
      <a class="nav-item nav-link" id="nav-agenda-tab" data-toggle="tab" href="#nav-agenda" role="tab" aria-controls="nav-agenda" aria-selected="false">Agenda</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-berita" role="tabpanel" aria-labelledby="nav-berita-tab">
     <?php foreach ($beritaterbaru->result() as $row): ?>
       <a href="<?php echo site_url('berita/vw-' . $row->slug); ?>">
        <div class="single-blog-post post-style-2 d-flex align-items-center">
          <div class="post-thumbnail">
            <img src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>" alt="" class="img-fluid" width="100">
          </div>
          <!-- Post Content -->
          <div class="post-content">
           <a href="<?php echo site_url('berita/vw-' . $row->slug); ?>" class="headline">
             <h5><?php echo $row->judul; ?></h5>
           </a>
           <!-- Post Meta -->
           <div class="post-meta">
            <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal)); ?> <?php echo date("M Y", strtotime($row->tanggal)); ?></p>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach;?>
  <br>
  <a href="<?php echo site_url('berita'); ?>" class="btn btn-outline-danger btn-block">Selengkapnya</a>
</div>
<div class="tab-pane fade " id="nav-pengumuman" role="tabpanel" aria-labelledby="nav-pengumuman-tab">
 <?php foreach ($pengumumanterbaru->result() as $row): ?>
   <!-- <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>"> -->
    <div class="single-blog-post post-style-2 d-flex align-items-center">
      <div class="post-thumbnail">
        <img src="<?php echo base_url('assets/images/pengumuman.jpg') ?>" alt="" class="img-fluid" width="95" >

      </div>
      <!-- Post Content -->
      <div class="post-content">
       <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>" class="headline">
        <h5><?php echo $row->judul; ?></h5>
      </a>
      <div class="post-meta">
        <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal)); ?> <?php echo date("M Y", strtotime($row->tanggal)); ?></p>
      </div>
    </div>
  </div>
  <!-- </a> -->
<?php endforeach;?>
<br>
<a href="<?php echo site_url('pengumuman'); ?>" class="btn btn-outline-danger btn-block">Selengkapnya</a>
</div>
<div class="tab-pane fade" id="nav-agenda" role="tabpanel" aria-labelledby="nav-agenda-tab">
  <?php foreach ($agendaterbaru->result() as $row): ?>
    <a href="<?php echo site_url('agenda/vw:' . $row->slug); ?>">
      <div class="single-blog-post post-style-2 d-flex align-items-center">
        <div class="event_date">
          <div class="event-date-wrap">
            <p><?php echo date("d", strtotime($row->startdate)); ?></p>
            <span><?php echo date("M. Y", strtotime($row->startdate)); ?></span>
          </div>
        </div>

        <!-- Post Content -->
        <div class="post-content">
          <a href="<?php echo site_url('agenda/vw:' . $row->slug); ?>" class="headline">
            <h5><?php echo $row->nama ?></h5>
          </a>
          <!-- Post Meta -->
          <div class="post-meta">
            <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal)); ?> <?php echo date("M Y", strtotime($row->tanggal)); ?></p>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach;?>
  <br>
  <a href="<?php echo site_url('agenda'); ?>" class="btn btn-outline-danger btn-block">Selengkapnya</a>
</div>
</div>
</div>
<!-- Populer -->
<div class="card my-4">
  <h5 class="card-header bg-danger text-white">Berita Populer</h5>
  <div class="card-body">
    <?php foreach ($populer->result() as $row): ?>
     <a href="<?php echo site_url('berita/vw-' . $row->slug); ?>">
      <div class="single-blog-post post-style-2 d-flex align-items-center">
        <div class="post-thumbnail">
          <img src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>" alt="" class="img-fluid" width="100">
        </div>
        <!-- Post Content -->
        <div class="post-content">
          <a href="<?php echo site_url('berita/vw-' . $row->slug); ?>" class="headline">
           <h5><?php echo $row->judul; ?></h5>
         </a>
         <!-- Post Meta -->
         <div class="post-meta">
          <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal)); ?> <?php echo date("M Y", strtotime($row->tanggal)); ?></p>
        </div>
      </div>
    </div>
  </a>
<?php endforeach;?>
</div>
<div class="card-footer">
  <a href="<?php echo site_url('berita'); ?>" class="btn btn-outline-danger btn-block">Selengkapnya</a>

</div>
</div>
<!-- Categories Widget -->
<div class="card my-4">
 <h5 class="card-header bg-danger text-white">Kategori Berita</h5>
 <div class="card-body">
  <div class="blog-category_block">
    <ul>
      <?php foreach ($allkate->result() as $row): ?>
        <li><a href="<?php echo site_url('blog/kategori/' . str_replace(" ", "-", $row->nama)); ?>"><?php echo $row->nama; ?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
      <?php endforeach;?>
    </ul>
  </div>
</div>
</div>

<!-- Side Widget -->
