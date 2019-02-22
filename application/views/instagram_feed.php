<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div id="wrap">
<div class="marketing">

  <?php $this->load->view('template/pathway')?>
  <!-- <div class="featurette-divider"></div> -->
  <section class="gallery-block compact-gallery">
     <div id="main" class="container clear-top">
      <div class="row">
        <div class="col-sm-3 blog-sidebar">
          <h5>KATEGORI</h5>
          <ul>
            <li><a href="<?php echo base_url('media/gallery') ?>">Gallery</a></li>
            <li class="active"><a href="<?php echo base_url('media/instagram') ?>">Instagram</a></li>
          </ul>

        </div>
        <div class="col-sm-9">
          <h3 class="p-title">Gallery <span style="color:#DC3545;">Instagram </span></h3>
          <div class="row no-gutters" id="instafeed-gallery-feed">


          </div>
        </div>
      </div>

    </div>
  </section>

</div>
</div>
<!-- end feature yo-->
<!-- FOOTER -->
<?php $this->load->view('template/footer')?>
