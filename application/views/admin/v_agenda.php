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
  					Data Agenda
  					<small></small>
  				</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Agenda</li>
      </ol> -->
      <?php
$this->load->view('admin/v_bread');
?>
  </section>

  <!-- Main content -->
  <section class="content">
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="box">

  				<div class="box">
  					<div class="box-header">
  						<a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Agenda</a>
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">
  						<table id="example1" class="table table-striped" style="font-size:12px;">
  							<thead>
  								<tr>
  									<th style="width:70px;">No</th>
  									<th>#</th>
  									<th>Agenda</th>
  									<th>Tanggal</th>
  									<th>Tempat</th>
  									<th>Waktu</th>
  									<th>Author</th>
  									<th style="text-align:right;">Aksi</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
	$agenda_id = $i['id'];
	$agenda_nama = $i['nama'];
	$agenda_deskripsi = $i['deskripsi'];
	$agenda_mulai = $i['startdate'];
	$agenda_selesai = $i['enddate'];
	$agenda_tempat = $i['tempat'];
	$agenda_waktu = $i['waktu'];
	$agenda_keterangan = $i['ket'];
	$agenda_author = $i['userid'];
	$tanggal = $i['tanggal'];

	?>
	  									<tr>
	  										<td><?php echo $no; ?></td>
	  										<td><?php echo $tanggal; ?></td>
	  										<td><?php echo $agenda_nama; ?></td>
	  										<td><?php echo $agenda_mulai . ' s/d ' . $agenda_selesai; ?></td>
	  										<td><?php echo $agenda_tempat; ?></td>
	  										<td><?php echo $agenda_waktu; ?></td>
	  										<td><?php echo $agenda_author; ?></td>
	  										<td style="text-align:right;">
	  											<a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $agenda_id; ?>"><span class="fa fa-pencil"></span></a>
	  											<a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $agenda_id; ?>"><span class="fa fa-trash"></span></a>
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
				<h4 class="modal-title" id="myModalLabel">Add Agenda</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/simpan_agenda' ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
						<div class="col-sm-7">
							<input type="text" name="xnama_agenda" class="form-control" id="inputUserName" placeholder="Nama Agenda" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
						<div class="col-sm-7">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" name="xmulai" class="form-control pull-right" id="datepicker" required>
							</div>
						</div>
						<!-- /.input group -->
					</div>
					<!-- /.form group -->

					<!-- Date range -->
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
						<div class="col-sm-7">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" name="xselesai" class="form-control pull-right" id="datepicker2" required>
							</div>
						</div>
						<!-- /.input group -->
					</div>
					<!-- /.form group -->
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
						<div class="col-sm-7">
							<input type="text" name="xtempat" class="form-control" id="inputUserName" placeholder="Tempat" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
						<div class="col-sm-7">
							<input type="text" name="xwaktu" class="form-control" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
						<div class="col-sm-7">
							<textarea class="form-control" name="xketerangan" rows="2" placeholder="Keterangan ..."></textarea>
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
	$agenda_id = $i['id'];
	$agenda_nama = $i['nama'];
	$agenda_deskripsi = $i['deskripsi'];
	$agenda_mulai = $i['startdate'];
	$agenda_selesai = $i['enddate'];
	$agenda_tempat = $i['tempat'];
	$agenda_waktu = $i['waktu'];
	$agenda_keterangan = $i['ket'];
	$agenda_author = $i['userid'];
	$tangal = $i['tanggal'];
	?>
		<!--Modal Edit Pengguna-->
		<div class="modal fade" id="ModalEdit<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
						<h4 class="modal-title" id="myModalLabel">Edit Agenda</h4>
					</div>
					<form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/update_agenda' ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">

							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
								<div class="col-sm-7">
									<input type="hidden" name="kode" value="<?php echo $agenda_id; ?>">
									<input type="text" name="xnama_agenda" class="form-control" value="<?php echo $agenda_nama; ?>" id="inputUserName" placeholder="Nama Agenda" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
								<div class="col-sm-7">
									<textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $agenda_deskripsi; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
								<div class="col-sm-7">
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" name="xmulai" value="<?php echo $agenda_mulai; ?>" class="form-control pull-right datepicker3" required>
									</div>
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group -->

							<!-- Date range -->
							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
								<div class="col-sm-7">
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" name="xselesai" value="<?php echo $agenda_selesai; ?>" class="form-control pull-right datepicker4" required>
									</div>
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form group -->
							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
								<div class="col-sm-7">
									<input type="text" name="xtempat" class="form-control" value="<?php echo $agenda_tempat; ?>"  id="inputUserName" placeholder="Tempat" required>
								</div>
							</div>

							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
								<div class="col-sm-7">
									<input type="text" name="xwaktu" class="form-control" value="<?php echo $agenda_waktu; ?>" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
								</div>
							</div>

							<div class="form-group">
								<label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
								<div class="col-sm-7">
									<textarea class="form-control" name="xketerangan" rows="2" placeholder="Keterangan ..."><?php echo $agenda_keterangan; ?></textarea>
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
	$agenda_id = $i['id'];
	$agenda_nama = $i['nama'];
	$agenda_deskripsi = $i['deskripsi'];
	$agenda_mulai = $i['startdate'];
	$agenda_selesai = $i['enddate'];
	$agenda_tempat = $i['tempat'];
	$agenda_waktu = $i['waktu'];
	$agenda_keterangan = $i['ket'];
	$agenda_author = $i['userid'];
	$tangal = $i['tanggal'];
	?>
		<!--Modal Hapus Pengguna-->
		<div class="modal fade" id="ModalHapus<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
						<h4 class="modal-title" id="myModalLabel">Hapus Agenda</h4>
					</div>
					<form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/hapus_agenda' ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" name="kode" value="<?php echo $agenda_id; ?>"/>
							<p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $agenda_nama; ?></b> ?</p>

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
				text: "Agenda Berhasil disimpan ke database.",
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
					text: "Agenda berhasil di update",
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
						text: "Agenda Berhasil dihapus.",
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
