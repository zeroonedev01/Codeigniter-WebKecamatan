  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keyword" content="Kecamatan Kalimanah, Kalimanah, Portal Kecamatan Kalimanah, Web Kecamatan Kalimanah">
	<meta name="description" content="Portal Resmi Kecamatan Kalimanah">
  <title><?php echo SITE_NAME . ": " . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)) ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php $iden = $iden->row_array()?>
  <link rel="icon" href="<?=base_url('assetss/favicon/') . $iden['favicon']?>">