<?php
    $name = $_GET["name"];
    if(isset($_GET["type"])) $type = $_GET["type"];
    $dataFile = fopen("./data/ygo.txt", "r");
    $dataString = fread($dataFile, filesize("./data/ygo.txt"));
    $decodedData = json_decode($dataString, true);
    fclose($dataFile);

    $keyCount = 0;
    foreach($decodedData as $key => $cards) {
        //get first element of json data. this data has the key ["data"]. it has only one hash on the top level. under ["data"], there is the data of each card.
        foreach($cards as $key => $value) {
            if($keyCount == 0) $num = array_keys($cards);
            //get information of each card here.
            if(is_array($value)) {
                // if(strpos($value["name"], $name) !== false) {
                if(strpos($value["name"], $name) !== false && $value["type"] == $type) {
                    foreach($value as $key2 => $value2) {
                        if(is_array($value2)) {
                            foreach($value2 as $key3 => $value3) {
                                if(is_array($value3)) {
                                    foreach($value3 as $key4 => $value4) {
                                        echo "<p>$key4 : $value4 : $num[$keyCount]</p>";
                                    }
                                } else {
                                    echo "<p>$key3 : $value3 : $num[$keyCount]</p>";
                                }
                            }
                        } else {
                            echo "<p>$key2 : $value2 : $num[$keyCount]</p>";
                        }
                        // echo "<h1>not found</h1>";
                    }
                    $keyCount++;
                } else {
                    // echo "<p>".$value["name"] . " " . "failed"."</p>";
                }
                } else {
                    echo "<h1>not found!</h1>";
                }
            // $keyCount++;
        }
    }
    // foreach($decodedData as $key => $cards) {
    //     //get first element of json data. this data has the key ["data"]. it has only one hash on the top level. under ["data"], there is the data of each card.
    //     foreach($cards as $key => $value) {
    //         if($keyCount == 0) $num = array_keys($cards);
    //         //get information of each card here.

    //         if(is_array($value)) {
    //             foreach($value as $key2 => $value2) {
    //                 if(is_array($value2)) {
    //                     foreach($value2 as $key3 => $value3) {
    //                         if(is_array($value3)) {
    //                             foreach($value3 as $key4 => $value4) {
    //                                 echo "<p>$key4 : $value4 : $num[$keyCount]</p>";
    //                             }
    //                         } else {
    //                             echo "<p>$key3 : $value3 : $num[$keyCount]</p>";
    //                         }
    //                     }
    //                 } else {
    //                     echo "<p>$key2 : $value2 : $num[$keyCount]</p>";
    //                     echo "<p>".$value["name"]."</p>";
    //                 }
    //             }
    //         } else {
    //             echo "<h1>get card!</h1>";
    //         }
    //         $keyCount++;
    //     }
    // }
?>