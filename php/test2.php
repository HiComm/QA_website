<?php
//PDO設定
$pdo_dsn = 'mysql:host=localhost;dbname=hicomm_test;charset=utf8;';
$pdo_user = 'develop';
$pdo_pass = 'hicomm';
$pdo_option = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES => false,
	PDO::ATTR_STRINGIFY_FETCHES => false
);			
//データベース接続
try {
	$pdo = new PDO($pdo_dsn, $pdo_user, $pdo_pass, $pdo_option);
	$qry = $pdo->prepare("show columns from question");
	$qry->execute();
	foreach($qry->fetchAll() as $q){
		print_r($q);
	}

} catch (Exception $e) {
	header('Content-Type: text/plain; charset=UTF-8', true, 500);
	exit($e->getMessage());
}
?>

