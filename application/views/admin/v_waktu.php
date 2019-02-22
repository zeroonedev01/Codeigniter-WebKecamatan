<!DOCTYPE html>
<html>
<head>
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
          waktu Berita
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
                <div class="box-header">
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add waktu</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                       <th style="width:100px;">#</th>
                       <th>Hari</th>
                       <th>Jam</th>

                       <th style="text-align:right;">Aksi</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
	$id = $i['id'];
	$hari = $i['hari'];
	$jam = $i['jam'];
	?>
			                     <tr>
			                       <td><?php echo $no; ?></td>
			                       <td><?php echo $hari; ?></td>
			                       <td><?php echo $jam; ?></td>
			                       <td style="text-align:right;">
			                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
			                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
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



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->

    <!-- ./wrapper -->

    <!--Modal Add Pengguna-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Add Waktu Buka</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/waktu/simpan_waktu' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Hari</label>
                <div class="col-sm-7">
                  <input type="text" name="xhari" class="form-control" id="inputUserName" placeholder="Hair" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Jam</label>
                <div class="col-sm-7">
                  <input type="text" name="xjam" class="form-control" id="inputUserName" placeholder="ex =08.00-15.00WIB" required>
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


    <?php foreach ($data->result_array() as $i):
	$id = $i['id'];
	$hari = $i['hari'];
	$jam = $i['jam'];
	?>
			     <!--Modal Edit Pengguna-->
			     <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			       <div class="modal-dialog" role="document">
			         <div class="modal-content">
			           <div class="modal-header">
			             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
			             <h4 class="modal-title" id="myModalLabel">Edit waktu</h4>
			           </div>
			           <form class="form-horizontal" action="<?php echo base_url() . 'admin/waktu/update_waktu' ?>" method="post" enctype="multipart/form-data">
			             <div class="modal-body">

			               <div class="form-group">
			                 <label for="inputUserName" class="col-sm-4 control-label">Hari</label>
			                 <div class="col-sm-7">
			                  <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
			                  <input type="text" name="xhari" class="form-control" id="inputUserName" value="<?php echo $hari; ?>" placeholder="Hari" required>
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputUserName" class="col-sm-4 control-label">Jam</label>
			                <div class="col-sm-7">
			                 <input type="text" name="xjam" class="form-control" id="inputUserName" value="<?php echo $jam; ?>" placeholder="ex= 08.00-15.00WIB" required>
			               </div>
			             </div>

			           </div>
			           <div class="modal-footer">
			             <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
			             <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
			           </div>
			         </form>
			       </div>
			     </div>
			   </div>
			 <?php endforeach;?>

 <?php foreach ($data->result_array() as $i):
	$id = $i['id'];
	$hari = $i['hari'];
	$jam = $i['jam'];
	?>
			   <!--Modal Hapus Pengguna-->
			   <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			     <div class="modal-dialog" role="document">
			       <div class="modal-content">
			         <div class="modal-header">
			           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
			           <h4 class="modal-title" id="myModalLabel">Hapus waktu</h4>
			         </div>
			         <form class="form-horizontal" action="<?php echo base_url() . 'admin/waktu/hapus_waktu' ?>" method="post" enctype="multipart/form-data">
			           <div class="modal-body">
			            <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
			            <p>Apakah Anda yakin mau menghapus waktu buka <b><?php echo $hari; ?></b> ?</p>

			          </div>
			          <div class="modal-footer">
			           <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
			           <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
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

  <?php elseif ($this->session->flashdata('msg') == 'success'): ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "waktu Berhasil disimpan ke database.",
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
          text: "waktu berhasil di update",
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
            text: "waktu Berhasil dihapus.",
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
