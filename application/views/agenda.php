<?php $this->load->view('template/header');
$this->load->view('template/menu')?>
<div class="marketing">
  <?php $this->load->view('template/pathway')?>
  <div class="featurette-divider"></div>
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h3 class="p-title">Agenda <span style="color:#DC3545;"></span></h3>
       <!--  <div class="text-right">
          <div class="form-group" style="background: #f0f0f0">

            <label class="d-inline-block">View Mode</label>

            <select name="viewmode" class="form-control form-control-sm d-inline-block" style="width: auto;" id="viewmode">
             <option value="listview">List card</option>
             <option value="get_events">Kalender</option>
           </select>

         </div>
       </div> -->
       <div id="calendar"></div>
       <!-- <div id="tonton"></div> -->

     </div>

     <!-- Sidebar Widgets Column -->
     <div class="col-md-4">
       <?php $this->load->view('template/widget')?>

     </div>

   </div>
 </div>

</div>
<br>
<!-- end feature yo-->
<!-- FOOTER -->
<?php $this->load->view('template/footer')?>
