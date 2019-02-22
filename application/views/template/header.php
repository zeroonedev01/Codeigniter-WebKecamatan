<!DOCTYPE html>
<html>
<head>
	<!-- meta tag -->
	<meta charset="utf-8">
	<!-- nggo responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- favicon -->
	<link rel="icon" href="<?=base_url('assetss/favicon/favicon.png')?>">
	<title><?php echo SITE_NAME . "  Kalimanah - " . ucfirst($this->uri->segment(1)) ?></title>
	<!-- Bootstrap core CSS -->
	<link href="<?=base_url('assetss/css/bootstrap.min.css')?>" rel="stylesheet">
	<!-- Custom styles-->
	<link href="<?=base_url('assetss/css/carousel.css')?>" rel="stylesheet">
	<link href="<?=base_url('assetss/css/style.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assetss/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assetss/css/jssocials.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetss/css/jssocials-theme-flat.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assetss/fancybox/jquery.fancybox.min.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assetss/css/compact-gallery.css') ?>">
    <link href="<?php echo base_url('assetss/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

	<?php
function limit_words($string, $word_limit) {
	$words = explode(" ", $string);
	return implode(" ", array_splice($words, 0, $word_limit));
}
?>
</head>
<body>
