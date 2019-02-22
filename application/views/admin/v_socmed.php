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
          Social Media
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
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Social Media</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                       <th style="width:100px;">#</th>
                       <th>Nama</th>
                       <th>URL</th>
                       <th>Icon Style</th>

                       <th style="text-align:right;">Aksi</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
	$id = $i['id'];
	$nama = $i['nama'];
	$url = $i['url'];
	$icon = $i['icon'];

	?>
	                     <tr>
	                      <td><?php echo $id; ?></td>
	                      <td><?php echo $nama; ?></td>
	                      <td><?php echo $url; ?></td>
	                      <td><?php echo $icon; ?></td>

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

    <!--Modal Add -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Add Social Media</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/socmed/simpan_socmed' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="ex:facebook.com" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">URL</label>
                <div class="col-sm-7">
                  <input type="text" name="xurl" class="form-control" id="inputUserName" placeholder="ex:www.facebook.com/author" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Icon Style</label>
                <div class="col-sm-7">
                  <input type="text" name="xicon" class="form-control" id="inputUserName" placeholder="fa fa-facebook" required>
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
	$nama = $i['nama'];
	$url = $i['url'];
	$icon = $i['icon'];
	?>
	     <!--Modal Edit-->
	     <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
	            <h4 class="modal-title" id="myModalLabel">Edit socmed</h4>
	          </div>
	          <form class="form-horizontal" action="<?php echo base_url() . 'admin/socmed/update_socmed' ?>" method="post" enctype="multipart/form-data">
	            <div class="modal-body">
	              <div class="form-group">
	                <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
	                <div class="col-sm-7">
	                  <input type="hidden" name="kode" value="<?php echo $id; ?>">
	                  <input type="text" name="xnama" class="form-control" value="<?php echo $nama; ?>" id="inputUserName" placeholder="ex:facebook" required>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputUserName" class="col-sm-4 control-label">URL</label>
	                <div class="col-sm-7">
	                  <input type="text" name="xurl" class="form-control" value="<?php echo $url; ?>" id="inputUserName" placeholder="ex:www.facebook.com/wkwkw" required>
	                </div>
	              </div>
	              <div class="form-group">
	               <label for="inputUserName" class="col-sm-4 control-label">Icon Style</label>
	               <div class="col-sm-7">
	                 <input type="text" name="xicon" class="form-control" value="<?php echo $icon; ?>" id="inputUserName" placeholder="ex:fa fa-facebook" required>
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
	$nama = $i['nama'];
	$url = $i['url'];
	$icon = $i['icon'];
	?>
	 <!--Modal Hapus Pengguna-->
	 <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
	        <h4 class="modal-title" id="myModalLabel">Hapus socmed</h4>
	      </div>
	      <form class="form-horizontal" action="<?php echo base_url() . 'admin/socmed/hapus_socmed' ?>" method="post" enctype="multipart/form-data">
	        <div class="modal-body">
	         <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
	         <p>Apakah Anda yakin mau menghapus socmed buka <b><?php echo $nama; ?></b> ?</p>

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
        text: "socmed Berhasil disimpan ke database.",
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
          text: "socmed berhasil di update",
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
            text: "socmed Berhasil dihapus.",
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
