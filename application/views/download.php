<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div class="marketing">
  <?php $this->load->view('template/pathway')?>
  <div class="featurette-divider"></div>
  <div class="container">
    <h3 class="p-title">Download File<span style="color:#DC3545;"></span></h3>
<div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-striped" id="display">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Files</th>
                      <th>Tanggal</th>
                      <th>Oleh</th>
                      <th style="text-align:right;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$no = 1;
foreach ($data->result() as $row):
?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->judul; ?></td>
                      <td><?php echo $row->tanggal; ?></td>
                      <td><?php echo $row->oleh; ?></td>
                      <td style="text-align:right;"><a href="<?php echo site_url('download/get_file/' . $row->id); ?>" class="btn btn-outline-danger">Download</a></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

  </div>

</div>
<br>
<!-- end feature yo-->
<!-- FOOTER -->
<?php $this->load->view('template/footer')?>
