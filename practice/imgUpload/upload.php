<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $img = $_FILES["img"];
        $tmpPath = $img["tmp_name"];
        $imgPlace = $img["name"];
        $dstPath = "./img/$imgPlace";

        $tf = move_uploaded_file($tmpPath,$dstPath);
        if($tf){header("Location: "."./index.php");}
    }
?>