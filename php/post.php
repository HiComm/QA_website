<?php
    print("TEST");
    $link = mysqli_connect('172.19.150.181', 'develop', 'hicomm', 'hicomm_test');

    // 接続状況をチェックします
    if (mysqli_connect_errno()) {
        die("データベースに接続できません:" . mysqli_connect_error() . "\n");
    } else {
        echo("データベースの接続に成功しました。\n");
    }
?>