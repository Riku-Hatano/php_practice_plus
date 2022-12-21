<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cName = $_POST['cName'];
        $rName = $_POST['rName'];
        $comments = $_POST['comments'];

        $dbcon = new mysqli('localhost', 'root', '', 'test_db');
        $cmd = "INSERT INTO test2 (cName, rName, comments) VALUES ('$cName', '$rName', '$comments')";
        $dbcon -> query($cmd);
        header("Location: index.php");
    }
?>