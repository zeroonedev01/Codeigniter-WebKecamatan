<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div class="marketing">
  <?php $this->load->view('template/pathway')?>
  <div class="featurette-divider"></div>
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
       <h1 class="mt-4"><?php echo $title; ?></h1>

       <!-- Author -->
       <p class="lead">
        by
        <i class="fa fa-user"></i> <?php echo $author; ?>
      </p>

      <hr>
      <div class="meta">
        <div class="date"><i class="fa fa-calendar"></i> <?php echo $tanggal; ?>

      </div>
    </div>
    <hr>

    <!-- Preview Image -->
   <img class="img-fluid rounded" src="<?php echo base_url('assets/images/potensi/') . $image ?>" alt="900x300">

    <hr>

    <!-- Post Content -->

          <?php echo $blog; ?>

          <!-- //share cuk -->
          <div class="blog-icons">
            <div class="blog-share_block">
              <div class="pull-left"><h5>Bagikan Ke:</h5></div>
              <div class="sharePopup"></div>
            </div>
          </div>
  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">
   <?php $this->load->view('template/widget')?>

 </div>

</div>
</div>

</div>
<!-- end feature yo-->
<!-- FOOTER -->
<?php $this->load->view('template/footer')?>
