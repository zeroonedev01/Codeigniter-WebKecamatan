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
            <li class="active"><a href="<?php echo base_url('media/gallery') ?>">Gallery</a></li>
            <li ><a href="<?php echo base_url('media/instagram') ?>">Instagram</a></li>
          </ul>

        </div>
        <div class="col-sm-9">
         <h3 class="p-title">Gallery <span style="color:#DC3545;">Foto </span></h3>
         <form class="form-inline">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Pilih Album</label>
          <select class="custom-select my-1 mr-sm-2" id="select_album" name="album">
            <option value="0">Semua</option>
            <?php foreach ($albumda->result() as $row): ?>
              <option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
            <?php endforeach;?>
          </select>

        </form>
        <br>


        <div id="result" class="row no-gutters">

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
