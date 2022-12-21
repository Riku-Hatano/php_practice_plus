<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $deleteId = $_POST['deleteId'];

        $dbcon = new mysqli('localhost', 'root', '', 'test_db');
        $cmd = "DELETE FROM test1 WHERE id = $deleteId";
        $dbcon -> query($cmd);


        header("Location: index.php");
    }
?>