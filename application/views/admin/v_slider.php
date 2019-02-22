<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php $this->load->view('admin/v_meta')?>

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css' ?>">
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
        Slider Kecamatan
        <small></small>
      </h1>
      <?php $this->load->view('admin/v_bread')?>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-striped" style="font-size:13px;">
                  <thead>
                    <tr>
                     <th>#</th>
                     <th>Gambar</th>
                     <th style="text-align:center;">Aksi</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
	$id = $i['id'];
	$gambar = $i['gambar'];

	?>
					                   <tr>
					                    <td><?php echo $no ?></td>
					                    <td><img width="220" height="100" class="img-fluid" src="<?php echo base_url() . 'assets/images/slider/' . $gambar; ?>"></td>
					                    <td style="text-align:right;">
					                      <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
					                    </td>
					                  </tr>
					                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('admin/v_footer');?>
<!-- Control Sid</div>-->
<!-- ./wrapper -->

<?php foreach ($data->result_array() as $i):
	$id = $i['id'];
	$gambar = $i['gambar'];
	?>
					  <!--Modal Edit slider-->
					  <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					    <div class="modal-dialog" role="document">
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
					          <h4 class="modal-title" id="myModalLabel">Edit slider</h4>
					        </div>
					        <form class="form-horizontal" action="<?php echo base_url() . 'admin/slider/update_slider' ?>" method="post" enctype="multipart/form-data">
					          <div class="modal-body">
					            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
					            <input type="hidden" value="<?php echo $gambar; ?>" name="gambar">
					            <div class="form-group">
					              <label for="inputUserName" class="col-sm-4 control-label">Slider</label>
					              <div class="col-sm-7">
					                <input type="file" name="filefoto"/>
					              </div>
					            </div>

					          </div>
					          <div class="modal-footer">
					            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
					            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
					          </div>
					        </form>
					      </div>
					    </div>
					  </div>
					<?php endforeach;?>
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
      bgColor: '#FF4859'
    });
  </script>
  <?php elseif ($this->session->flashdata('msg') == 'warning'): ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Warning',
        text: "Gambar yang Anda masukan terlalu besar.",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FFC017'
      });
    </script>
    <?php elseif ($this->session->flashdata('msg') == 'success'): ?>
      <script type="text/javascript">
        $.toast({
          heading: 'Success',
          text: "slider Berhasil disimpan ke database.",
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
            text: "slider berhasil di update",
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
              text: "slider Berhasil dihapus.",
              showHideTransition: 'slide',
              icon: 'success',
              hideAfter: false,
              position: 'bottom-right',
              bgColor: '#7EC857'
            });
          </script>
          <?php elseif ($this->session->flashdata('msg') == 'show-modal'): ?>
            <script type="text/javascript">
              $('#ModalResetPassword').modal('show');
            </script>
            <?php else: ?>

            <?php endif;?>
          </body>
          </html>
