<div id="footer" class="footer">
	<div class="container">
		<a href="#" class="float-right fas fa-arrow-alt-circle-up fa-2x" style="color: #ffffff"></a>
		Copyright &copy;  <?php echo date("Y") ?> Kecamatan Kalimanah || Made with <span i class="fa fa-heart" style="color:#DC3545"> </span> by Bhinneka Software in SMKN 1 Purbalingga
	</div>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="<?=base_url('assetss/js/jquery-slim.min.js')?>"><\/script>')</script>
<script src="<?=base_url('assetss/js/popper.min.js')?>"></script>
<script src="<?=base_url('assetss/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assetss/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assetss/js/dataTables.bootstrap4.min.js') ?>"></script>
<script>
  $(document).ready(function() {
    $('#display').DataTable();
  });
</script>
<script src="<?=base_url('assetss/fancybox/jquery.fancybox.min.js')?>"></script>
<script src="<?=base_url('assetss/js/engine.js')?>"></script>
<script src="<?php echo base_url('assetss/js/jssocials.js') ?>"></script>
<script>
  $(document).ready(function(){
    $(".sharePopup").jsSocials({
      showCount: true,
      showLabel: true,
      shareIn: "popup",
      shares: [
      "email",
      "twitter",
      "facebook",
      "googleplus",
      "linkedin",
      { share: "pinterest", label: "Pin this" },
      "whatsapp"
      ]
    });
  });
</script>
<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

// Get the element with id="defaultOpen" and click on it
if(document.getElementById("defaultOpen"))
{
  document.getElementById("defaultOpen").click();
}

</script>
<script type="text/javascript" src="<?php echo base_url('assetss/js/instafeed.min.js') ?>"></script>
<script type="text/javascript">
  var userFeed = new Instafeed({
    get: 'user',
    userId: '8987997106',
    clientId: '924f677fa3854436947ab4372ffa688d',
    accessToken: '8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9',
    resolution: 'standard_resolution',
    template: '<div class="col-sm-2  col-md-2" ><div class="hovereffect"><a href="{{link}}" class="media-item" target="_blank" id="{{id}}"><img src="{{image}}" class="img-fluid bg1" /> <i class="fa fa-instagram icon fa-2x" style="color: gray;right: 10px;position: absolute;top: 7px;"></i><div class="overlay"><h2><i class="fa fa-thumbs-up"> {{likes}}</i> <i class="fa fa-comment"></i> {{comments}}</h2></div></a></div></div> ',
    sortBy: 'most-recent',
    limit: 6,
    links: false
  });
  if ($('#instafeed').length) {
    userFeed.run();
  }

</script>
<script type="text/javascript">
  var galleryFeed = new Instafeed({
    get: 'user',
    userId: '8987997106',
    clientId: '924f677fa3854436947ab4372ffa688d',
    accessToken: '8987997106.924f677.8555ecbd52584f41b9b22ec1a16dafb9',
    resolution: 'standard_resolution',
    template: ' <div class="col-md-6 col-lg-4 item zoom-on-hover" ><div class="hovereffect"><a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" class="img-fluid " /> <i class="fa fa-instagram icon fa-2x" style="color: gray;right: 10px;position: absolute;top: 7px;"></i></a> <div class="overlay"><h2><i class="fa fa-thumbs-up"> {{likes}}</i> <i class="fa fa-comment"></i> {{comments}}</h2></div></div></div>',
    sortBy: 'most-recent',
    links: false,
    target: "instafeed-gallery-feed",
  });
  if ($('#instafeed-gallery-feed').length) {
    galleryFeed.run();
  }

</script>
</body>
</html>
