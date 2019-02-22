<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view('admin/v_meta')?>

 <!-- Bootstrap 3.3.6 -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
 <!-- Theme style -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>"/>

  </head>
  <body class="hold-transition skin-red sidebar-mini fixed skin-red-light">
    <div class="wrapper">

     <?php
$this->load->view('admin/v_header');
$this->load->view('admin/v_menu');

?>
     <!-- Left side column. contains the logo and sidebar -->
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Identitas Kecamatan
          <small></small>
        </h1>
        <?php $this->load->view('admin/v_bread')?>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <?php
$i = $data->row_array();

?>
              <form class="form-horizontal" action="<?php echo base_url() . 'admin/identitas/update_identitas' ?>" method="post" enctype="multipart/form-data">
                <div class="col-md-8">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-md-4 control-label">Email</label>

                      <div class="col-sm-8">
                       <input type="hidden" name="kode" value="<?php echo $i['id'] ?>">
                       <input type="email" class="form-control" id="inputName" name="xemail" value="<?php echo $i['email']; ?>" placeholder="Email Website" required>
                     </div>
                   </div>
                   <div class="form-group">
                    <label for="inputName" class="col-md-4 control-label">Telepon</label>
                    <div class="col-sm-8">
                     <input type="text" class="form-control" id="inputName" name="xtelepon" value="<?php echo $i['telepon']; ?>" placeholder="Email Kecamatan" required>
                   </div>
                 </div>
                 <div class="form-group">
                  <label for="inputExperience" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="inputExperience" name="xalamat" placeholder="Alamat" required rows="4"><?php echo $i['alamat']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputExperience" class="col-sm-4 control-label">Embed Peta</label>

                  <div class="col-sm-8">
                    <textarea class="form-control" id="inputExperience" name="xmaps" placeholder="Peta" required rows="7"><?php echo $i['maps']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Brand</label>
                  <div class="col-sm-7">
                      <input type="hidden" value="<?php echo $i['brand']; ?>" name="ff1">
                    <input type="file" name="brand"/>
                      <p><?php echo $i['brand']; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Favicon</label>
                  <div class="col-sm-7">
                     <input type="hidden" value="<?php echo $i['favicon']; ?>" name="ff2">
                    <input type="file" name="favicon"/>
                    <p><?php echo $i['favicon']; ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                   <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                 </div>
               </div>
             </div>
           </div>
         </form>
       </div>
       <!-- /.box-body -->
     </div>
   </div>
   <!-- /.box -->
 </div>
 <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/v_footer');?>
<!--Modal Edit-->





<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if ($this->session->flashdata('msg') == 'error'): ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Error',
      text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF6859'
    });
  </script>

  <?php elseif ($this->session->flashdata('msg') == 'success'): ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "identitas Berhasil disimpan ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
    <?php elseif ($this->session->flashdata('msg') == 'info'): ?>
      <script type="text/javascript">
        $.toast({
          heading: 'Info',
          text: "identitas berhasil di update",
          showHideTransition: 'slide',
          icon: 'info',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#00C9E6'
        });
      </script>
      <?php elseif ($this->session->flashdata('msg') == 'success-hapus'): ?>
        <script type="text/javascript">
          $.toast({
            heading: 'Success',
            text: "identitas Berhasil dihapus.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#7EC857'
          });
        </script>
        <?php else: ?>

        <?php endif;?>
      </body>
      </html>
