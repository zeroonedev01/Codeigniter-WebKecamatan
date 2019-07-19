<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div class="marketing">
  <?php $this->load->view('template/pathway')?>
  <div class="featurette-divider"></div>
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h3 class="p-title">POTENSI <span style="color:#DC3545;"></span></h3>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php foreach ($data->result() as $row): ?>
         <a href="<?php echo site_url('potensi/vw:' . $row->slug); ?>">
          <div class="single-blog-post post-style-4 d-flex align-items-center">
            <!-- Post Thumbnail -->
            <div class="post-thumbnail">
             <img src="<?php echo base_url('assets/images/potensi/') . $row->gambar; ?>" alt="" class="img-fluid gabr">
           </div>
           <!-- Post Content -->
           <div class="post-content">
            <a href="<?php echo site_url('potensi/vw:' . $row->slug); ?>" class="headline">
              <h4><?php echo $row->judul; ?></h4>
            </a>
             <p> <?php echo limit_words($row->isi, 15) . '...'; ?></p>
            <!-- Post Meta -->
           <div class="post-meta">
                <p><i class="fa fa-calendar"></i> Posted  <?php echo $row->tanggal1; ?></p>
              </div>
          </div>
        </div>
     </a>
        <?php endforeach;?>

      <!-- Pagination -->
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
<!-- end feature yo-->
<!-- FOOTER -->
<?php $this->load->view('template/footer')?>
