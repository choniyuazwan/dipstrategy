<?php global $site;?>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Copyright" content="Octa Al Dino Rangsangpati">
	    <meta name="description" content="Project With <?=$site['theme']['sitename'];?>">
	    <meta name="author" content="Octa Al Dino Rangsangpati">

	    <title><?php echo (!empty($title)) ? $title." - ".$site['theme']['sitename'] : $site['theme']['sitename'];?></title>
		
		<!-- Custom fonts for this template-->
		<link href="<?=THEMEASSETS;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="<?=THEMEASSETS;?>vendor/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
		<link href="<?=THEMEASSETS;?>vendor/jquery/jquery.toast.min.css" rel="stylesheet">

		<style type="text/css">
			.shadow-company{
			    box-shadow: 0 10px 20px 0px rgba(58,59,69,.15)!important;
				background-color: rgba(250,250,250,1) !important;
			}
		</style>