<html>
<pre>
<?php
	ini_set('display_errors', "On");//enable error log output

	print("TEST<br>");
	print("TEST2");

	$pdo_dsn = 'mysql:host=localhost;dbname=hicomm_test;charset=utf8;';
	$pdo_user = 'develop';
	$pdo_pass = 'hicomm';
	$pdo_option = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::ATTR_STRINGIFY_FETCHES => false
	);

	try {
		$pdo = new PDO($pdo_dsn, $pdo_user, $pdo_pass, $pdo_option);
	} catch (Exception $e) {
		header('Content-Type: text/plain; charset=UTF-8', true, 500);
		exit($e->getMessage());
	}

 	$qry = $pdo->prepare('show columns from question');
	$qry = $pdo->prepare("select * from question");
 	//$qry = $pdo->prepare('insert question values ("test_id", "2020-05-08", "useridtest", "これはテストのテキストです。", 0b01, 12)');
	$qry->execute();
	
 	foreach($qry->fetchAll() as $q){
		nl2br(print_r($q));
	}
	
?>
</pre>
</html>
