<?php
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

$domain  = $url."/exam";
$siteName = "Developer Dipstrategy";
$themeActive = "bootstrap4";


$theme = array(
	'bootstrap4' => array(
		'path' => dirname(__DIR__, 1).'/theme/bootstrap4/',
		'pathmodule' => 'theme/bootstrap4/module/',
		'pathmoduleshort' => 'module/',
		'assets' => $domain.'/theme/bootstrap4/assets/'
	)
);

return array(
	'domain' => $domain,
	'offline' => array(
		'status' => '0',
		'message' => '<center>We are Maintenance</center>'
	),
	'uploadpath' => dirname(__DIR__, 1)."/repository/upload/",
	'theme' => array(
		'path' => $theme[$themeActive]['path'],
		'url' => $domain.'/',
		'module' => $theme[$themeActive]['pathmodule'],
		'moduleshort' => $theme[$themeActive]['pathmoduleshort'],
		'assets' => $theme[$themeActive]['assets'],
		'sitename' => $siteName
	)
);
