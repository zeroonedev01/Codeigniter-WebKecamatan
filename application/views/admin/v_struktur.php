<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view('admin/v_meta')?>

 <!-- Bootstrap 3.3.6 -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
 <!-- daterange picker -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
 <!-- bootstrap datepicker -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
 <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/iCheck/all.css' ?>">
 <!-- Bootstrap Color Picker -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/colorpicker/bootstrap-colorpicker.min.css' ?>">
 <!-- Bootstrap time Picker -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
 <!-- Select2 -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/select2/select2.min.css' ?>">
 <!-- Theme style -->
 <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">


  </head>
  <body class="hold-transition skin-red sidebar-mini fixed skin-red-light">
    <div class="wrapper">
     <?php
$this->load->view('admin/v_header');
$this->load->view('admin/v_menu');
?>
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
         Struktur Organisasi
         <small></small>
       </h1>
       <?php $this->load->view('admin/v_bread')?>

     </section>

     <!-- Main content -->
     <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Judul</h3>
        </div>
        <?php
$b = $data->row_array();
?>
        <form action="<?php echo base_url() . 'admin/struktur/update_struktur' ?>" method="post" enctype="multipart/form-data">

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-10">
                <input type="text" name="xjudul" class="form-control" value="<?php echo $b['judul']; ?>" placeholder="Judul" required/>
              </div>
              <!-- /.col -->
              <div class="col-md-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

          <div class="row">
            <div class="col-md-12">

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Struktur Organisasi</h3>
                </div>
                <div class="box-body">

                  <textarea id="ckeditor" name="xisi" required><?php echo $b['isi']; ?></textarea>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

            </div>
          </div>
          <!-- /.col (left) -->
          <!-- /.box -->
        </form>

        <!-- /.box -->
      </div>
      <!-- /.col (right) -->

      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/v_footer');?>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url() . 'assets/plugins/select2/select2.full.min.js' ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url() . 'assets/plugins/input-mask/jquery.inputmask.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/input-mask/jquery.inputmask.date.extensions.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/input-mask/jquery.inputmask.extensions.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/ckeditor/ckeditor.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- Page script -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

CKEDITOR.replace('ckeditor',{
        filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder'); ?>'
    });
    CKEDITOR.config.removeButtons = 'Print,NewPage,Preview,Save,Templates,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CreateDiv,Language,Anchor,Flash,PageBreak,Iframe,About,ShowBlocks';
    CKEDITOR.config.toolbarGroups = [
    { name: 'document', groups: [ 'mode'] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker'] }, { name: 'insert' },    { name: 'tools' },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
    { name: 'links' },

    '/',
    { name: 'styles' },
    { name: 'colors' },


    ];


  });
</script>
<?php if ($this->session->flashdata('msg') == 'info'): ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Info',
      text: "struktur organisasi berhasil di update",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
  <?php elseif ($this->session->flashdata('msg') == 'info1'): ?>
   <script type="text/javascript">
     $.toast({
      heading: 'Info',
      text: "struktur organisasi berhasil di update tdengan gambar tetap",
      showHideTransition: 'slide',
      icon: 'info',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#00C9E6'
    });
  </script>
  <?php else: ?>
  <?php endif;?>
</body>
</html>
