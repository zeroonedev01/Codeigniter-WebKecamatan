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

   <?php
function limit_words($string, $word_limit) {
	$words = explode(" ", $string);
	return implode(" ", array_splice($words, 0, $word_limit));
}

?>

 </head>
 <body class="hold-transition skin-red sidebar-mini fixed skin-red-light">
  <div class="wrapper">

    <!--Header-->

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
          List Potensi
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
                  <a class="btn btn-success btn-flat" href="<?php echo base_url() . 'admin/potensi/add_potensi' ?>"><span class="fa fa-plus"></span> Post potensi</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                       <th>Gambar</th>
                       <th>Judul</th>
                       <th>Tanggal</th>
                       <th>Author</th>
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
	$tanggal = $i['tanggal'];
	$author = $i['author'];
	$gambar = $i['gambar'];

	?>
								                     <tr>
								                       <td><img src="<?php echo base_url() . 'assets/images/potensi/' . $gambar; ?>" style="width:90px;"></td>
								                       <td><?php echo $judul; ?></td>
								                       <td><?php echo $tanggal; ?></td>
								                       <td><?php echo $author; ?></td>
								                       <td style="text-align:right;">
								                         <a class="btn" href="<?php echo base_url() . 'admin/potensi/get_edit/' . $id; ?>"><span class="fa fa-pencil"></span></a>
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



 <?php foreach ($data->result_array() as $i):
	$id = $i['id'];
	$judul = $i['judul'];
	$gambar = $i['gambar'];
	?>
								   <!--Modal Hapus Pengguna-->
								   <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								     <div class="modal-dialog" role="document">
								       <div class="modal-content">
								         <div class="modal-header">
								           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
								           <h4 class="modal-title" id="myModalLabel">Hapus potensi</h4>
								         </div>
								         <form class="form-horizontal" action="<?php echo base_url() . 'admin/potensi/hapus_potensi' ?>" method="post" enctype="multipart/form-data">
								           <div class="modal-body">
								             <input type="hidden" name="kode" value="<?php echo $id; ?>"/>
								             <input type="hidden" value="<?php echo $gambar; ?>" name="gambar">
								             <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $judul; ?></b> ?</p>

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
        text: "potensi Berhasil disimpan ke database.",
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
          text: "potensi berhasil di update",
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
            text: "potensi Berhasil dihapus.",
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
