<?php
    $name = $_GET["name"];
    $dataFile = fopen("./data/ygo.txt", "r");
    $dataString = fread($dataFile, filesize("./data/ygo.txt"));
    $decodedData = json_decode($dataString, true);
    fclose($dataFile);
    foreach($decodedData as $key => $cards) {
        foreach($cards as $key => $value) {
            if(is_array($value)) {
                foreach($value as $key2 => $value2) {
                    if(is_array($value2)) {
                        foreach($value2 as $key3 => $value3) {
                            if(is_array($value3)) {
                                foreach($value3 as $key4 => $value4) {
                                    echo "<p>$key4 : $value4</p>";
                                }
                            } else {
                                echo "<p>$key3 : $value3</p>";
                            }
                        }
                    } else {
                        echo "<p>$key2 : $value2</p>";
                    }
                }
            } else {
                echo "<p>$key : $value</p>";
            }
        }
    }
?>