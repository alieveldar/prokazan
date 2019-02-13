<?php
$dbservice = array(
	'dbhost' => 'localhost',
	'dbname' => 'ProKazan',
	'dbuser' => 'volleyadmin',
	'dbpassword' => 'volley2018',
);
$connectEDB = mysqli_connect($dbservice['dbhost'], $dbservice['dbuser'], $dbservice['dbpassword'], $dbservice['dbname']);
mysqli_set_charset($connectEDB, "utf8");
?>