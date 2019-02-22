<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div class="marketing">
  <?php $this->load->view('template/pathway')?>
  <div class="featurette-divider"></div>
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h3 class="p-title">Agenda <span style="color:#DC3545;"></span></h3>
        <?php foreach ($data->result() as $row): ?>
          <div class="single-blog-post post-style-4  align-items-center">
            <!-- Post Thumbnail -->
            <div class="row">hg
              <div class="col-md-4">
              <div class="event1-date">
                <h4><?php echo date("d", strtotime($row->startdate)); ?></h4> <span><?php echo date("M Y", strtotime($row->startdate)); ?></span>
              </div>
              <span class="event1-time"><?php echo $row->waktu; ?></span>
            </div>
            <div class="col-md-8">
              <!-- Post Content -->
              <div class="post-content">
                <a href="<?php echo site_url('agenda/vw:' . $row->slug); ?>" class="headline">
                  <h4><?php echo $row->nama ?></h4>

                </a>
                <p><?php echo limit_words($row->deskripsi, 15) . '...'; ?></p>
                <!-- Post Meta -->
                <div class="post-meta">
                <p><i class="fa fa-paper-plane-o"></i> Posted <?php echo $row->tanggal ?>  </p>
              </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;?>

      <!-- Pagination -->
<!--       <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul> -->

        <?php
// error_reporting(0);
echo $page; ?>


    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
     <?php $this->load->view('template/widget')?>

   </div>

 </div>
</div>

</div>
<br>
<!-- end feature yo-->
<!-- FOOTER -->
<?php $this->load->view('template/footer')?>
