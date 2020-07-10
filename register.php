<?php
	ini_set('display_errors', "On");
	require("./php/accessDB.php");
	echo $_POST["email"];
	echo $_POST["password"];

	$qry = $pdo->prepare('show columns from question');
	$qry = $pdo->prepare("select * from question");
 	//$qry = $pdo->prepare('insert question values ("test_id", "2020-05-08", "useridtest", "これはテストのテキストです。", 0b01, 12)');
	$done = $qry->execute();

	if($done){
		echo "TRUE";
	}

	foreach($qry->fetchAll() as $q){
		nl2br(print_r($q));
	}

	echo "hello world!";
?>
