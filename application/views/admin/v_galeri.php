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
          Gallery Photos
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
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Photo</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                       <th>Gambar</th>
                       <th>Judul</th>
                       <th>Tanggal</th>
                       <th>Album</th>
                       <th>Author</th>
                       <th style="text-align:right;">Aksi</th>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
	$galeri_id = $i['id'];
	$galeri_judul = $i['judul'];
	$galeri_tanggal = $i['tanggal'];
	$galeri_author = $i['author'];
	$galeri_gambar = $i['gambar'];
	$galeri_album_id = $i['albumid'];
	$galeri_album_nama = $i['album'];

	?>
										                     <tr>
										                      <td><img src="<?php echo base_url() . 'assets/images/' . $galeri_gambar; ?>" style="width:80px;"></td>
										                      <td><?php echo $galeri_judul; ?></td>
										                      <td><?php echo $galeri_tanggal; ?></td>
										                      <td><?php echo $galeri_album_nama; ?></td>
										                      <td><?php echo $galeri_author; ?></td>
										                      <td style="text-align:right;">
										                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $galeri_id; ?>"><span class="fa fa-pencil"></span></a>
										                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $galeri_id; ?>"><span class="fa fa-trash"></span></a>
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
  <?php
$this->load->view('admin/v_footer.php');
?>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url() . 'admin/galeri/simpan_galeri' ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Album</label>
            <div class="col-sm-7">

              <select class="form-control" name="xalbum" style="width: 100%;" required>
                <option value="">-Pilih-</option>
                <?php
$no = 0;
foreach ($alb->result_array() as $a):
	$no++;
	$alb_id = $a['id'];
	$alb_nama = $a['nama'];

	?>
										                 <option value="<?php echo $alb_id; ?>"><?php echo $alb_nama; ?></option>
										               <?php endforeach;?>
             </select>
           </div>
         </div>

         <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
          <div class="col-sm-7">
            <input type="file" name="filefoto" required/>
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

<!--Modal Edit Album-->
<?php foreach ($data->result_array() as $i):
	$galeri_id = $i['id'];
	$galeri_judul = $i['judul'];
	$galeri_tanggal = $i['tanggal'];
	$galeri_author = $i['author'];
	$galeri_gambar = $i['gambar'];
	$galeri_album_id = $i['albumid'];
	$galeri_album_nama = $i['album'];
	?>

										  <div class="modal fade" id="ModalEdit<?php echo $galeri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										    <div class="modal-dialog" role="document">
										      <div class="modal-content">
										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
										          <h4 class="modal-title" id="myModalLabel">Edit Photo</h4>
										        </div>
										        <form class="form-horizontal" action="<?php echo base_url() . 'admin/galeri/update_galeri' ?>" method="post" enctype="multipart/form-data">
										          <div class="modal-body">
										            <input type="hidden" name="kode" value="<?php echo $galeri_id; ?>"/>
										            <input type="hidden" value="<?php echo $galeri_gambar; ?>" name="gambar">
										            <div class="form-group">
										              <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
										              <div class="col-sm-7">
										                <input type="text" name="xjudul" class="form-control" value="<?php echo $galeri_judul; ?>" id="inputUserName" placeholder="Judul" required>
										              </div>
										            </div>

										            <div class="form-group">
										              <label for="inputUserName" class="col-sm-4 control-label">Album</label>
										              <div class="col-sm-7">

										                <select class="form-control" name="xalbum" style="width: 100%;" required>
										                  <option value="">-Pilih-</option>
										                  <?php
	foreach ($alb->result_array() as $a) {
		$alb_id = $a['id'];
		$alb_nama = $a['nama'];
		if ($galeri_album_id == $alb_id) {
			echo "<option value='$alb_id' selected>$alb_nama</option>";
		} else {
			echo "<option value='$alb_id'>$alb_nama</option>";
		}

	}?>
										               </select>
										             </div>
										           </div>

										           <div class="form-group">
										            <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
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
<!--Modal Edit Album-->

<?php foreach ($data->result_array() as $i):
	$galeri_id = $i['id'];
	$galeri_judul = $i['judul'];
	$galeri_tanggal = $i['tanggal'];
	$galeri_author = $i['author'];
	$galeri_gambar = $i['gambar'];
	$galeri_album_id = $i['albumid'];
	$galeri_album_nama = $i['album'];
	?>
										 <!--Modal Hapus Pengguna-->
										 <div class="modal fade" id="ModalHapus<?php echo $galeri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
										        <h4 class="modal-title" id="myModalLabel">Hapus Photo</h4>
										      </div>
										      <form class="form-horizontal" action="<?php echo base_url() . 'admin/galeri/hapus_galeri' ?>" method="post" enctype="multipart/form-data">
										        <div class="modal-body">
										          <input type="hidden" name="kode" value="<?php echo $galeri_id; ?>"/>
										          <input type="hidden" value="<?php echo $galeri_gambar; ?>" name="gambar">
										          <input type="hidden" value="<?php echo $galeri_album_id; ?>" name="album">
										          <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $galeri_judul; ?></b> ?</p>

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
        text: "Photo Berhasil disimpan ke database.",
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
          text: "Photo berhasil di update",
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
            text: "Photo Berhasil dihapus.",
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
