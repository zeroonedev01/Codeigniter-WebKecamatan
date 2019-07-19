 <?php foreach ($data->result() as $row): ?>
          <div class='single-blog-post post-style-4  align-items-center'>
            <div class='row'>
              <div class='col-md-4'>
              <div class='event1-date'>
                <h4><?php echo date('d', strtotime($row->startdate)); ?></h4> <span><?php echo date('M Y', strtotime($row->startdate)); ?></span>
              </div>
            </div>
            <div class='col-md-8'>
              <div class='post-content'>
                <a href='<?php echo site_url('agenda/vw:' . $row->slug); ?>' class='headline'>
                  <h4><?php echo $row->nama ?></h4>

                </a>
                <p><?php echo limit_words($row->deskripsi, 15) . '...'; ?></p>
                <!-- Post Meta -->
                <div class='post-meta'>
                <p><i class='fa fa-paper-plane-o'></i> Posted <?php echo $row->tanggal1 ?>  </p>
              </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;?>

      <!-- Pagination -->
<!--       <ul class='pagination justify-content-center mb-4'>
        <li class='page-item'>
          <a class='page-link' href='#'>&larr; Older</a>
        </li>
        <li class='page-item disabled'>
          <a class='page-link' href='#'>Newer &rarr;</a>
        </li>
      </ul> -->

        <?php
// error_reporting(0);
echo $page; ?>