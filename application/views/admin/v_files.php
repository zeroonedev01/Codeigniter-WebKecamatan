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
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>"/>

</head>
 <body class="hold-transition skin-red sidebar-mini fixed skin-red-light">
  <div class="wrapper">
    <!--Header-->
    <?php
$this->load->view('admin/v_header');
$this->load->view('admin/v_menu');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Download
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
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add File</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="width:70px;">#</th>
                    <th>File</th>
                    <th>Tanggal Post</th>
                    <th>Oleh</th>
                    <th>Download</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
	$id = $i['id'];
	$judul = $i['judul'];
	$deskripsi = $i['deskripsi'];
	$oleh = $i['oleh'];
	$tanggal = $i['tanggal'];
	$download = $i['download'];
	$file = $i['data'];
	?>
												                <tr>
												                  <td><?php echo $no; ?></td>
												                  <td><a href="<?php echo base_url() . 'admin/files/download/' . $id; ?>"><?php echo $judul; ?></a></td>
												                  <td><?php echo $tanggal; ?></td>
												                  <td><?php echo $oleh; ?></td>
												                  <td><?php echo $download; ?></td>
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

</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add File</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/files/simpan_file' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-7">
                                  <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Oleh</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xoleh" class="form-control" id="inputUserName" placeholder="Oleh" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">File</label>
                                <div class="col-sm-7">
                                  <input type="file" name="filefoto" required>
                                  NB: file harus bertype pdf|doc|docx|ppt|pptx|zip. ukuran maksimal 2,7 MB.
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
	$judul = $i['judul'];
	$deskripsi = $i['deskripsi'];
	$oleh = $i['oleh'];
	$tanggal = $i['tanggal'];
	$download = $i['download'];
	$file = $i['data'];
	?>
													<!--Modal Edit Pengguna-->
												        <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												            <div class="modal-dialog" role="document">
												                <div class="modal-content">
												                    <div class="modal-header">
												                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
												                        <h4 class="modal-title" id="myModalLabel">Edit File</h4>
												                    </div>
												                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/files/update_file' ?>" method="post" enctype="multipart/form-data">
												                    <div class="modal-body">

												                             <div class="form-group">
												                                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
												                                <div class="col-sm-7">
												                                  <input type="hidden" name="kode" value="<?php echo $id; ?>">
												                                  <input type="hidden" name="file" value="<?php echo $file; ?>">
												                                  <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
												                                </div>
												                            </div>
												                            <div class="form-group">
												                                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
												                                <div class="col-sm-7">
												                                  <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $deskripsi; ?></textarea>
												                                </div>
												                            </div>
												                            <div class="form-group">
												                                <label for="inputUserName" class="col-sm-4 control-label">Oleh</label>
												                                <div class="col-sm-7">
												                                  <input type="text" name="xoleh" class="form-control" value="<?php echo $oleh; ?>" id="inputUserName" placeholder="Oleh" required>
												                                </div>
												                            </div>
												                            <div class="form-group">
												                                <label for="inputUserName" class="col-sm-4 control-label">File</label>
												                                <div class="col-sm-7">
												                                  <input type="file" name="filefoto">
												                                  NB: file harus bertype pdf|doc|docx|ppt|pptx|zip. ukuran maksimal 2,7 MB.
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
	$judul = $i['judul'];
	$deskripsi = $i['deskripsi'];
	$oleh = $i['oleh'];
	$tanggal = $i['tanggal'];
	$download = $i['download'];
	$file = $i['data'];
	?>
													<!--Modal Hapus Pengguna-->
												        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												            <div class="modal-dialog" role="document">
												                <div class="modal-content">
												                    <div class="modal-header">
												                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
												                        <h4 class="modal-title" id="myModalLabel">Hapus File</h4>
												                    </div>
												                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/files/hapus_file' ?>" method="post" enctype="multipart/form-data">
												                    <div class="modal-body">
																			             <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
												                           <input type="hidden" name="file" value="<?php echo $file; ?>">
												                            <p>Apakah Anda yakin mau menghapus file <b><?php echo $judul; ?></b> ?</p>

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
<script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
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

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
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
                    text: "File Berhasil disimpan ke database.",
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
                    text: "File berhasil di update",
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
                    text: "File Berhasil dihapus.",
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
