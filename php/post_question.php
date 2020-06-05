<?php
    #include("./accessDB.php");
    $ctx = hash_init('fnv1a64');
    hash_update($ctx, $_POST["userid"]);

    print_r($_POST["userid"]);
    print_r($_POST["title"]);
    print_r($_POST["body"]);
    print_r(hash_final($ctx));



?>