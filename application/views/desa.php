<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div class="marketing">
  <?php $this->load->view('template/pathway')?>
  <div class="featurette-divider"></div>
 <div class="container">

       <div class="row">
<?php $row = $statis->row_array()?>
      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h3 class="p-title"><?php echo $row['judul'] ?> <span style="color:#DC3545;"></span></h3>
        <!-- Post Content -->
        <div>
          <?php echo $row['isi'] ?>
        </div>

        <hr>
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
