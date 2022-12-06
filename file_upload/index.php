<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uploadedPicture = $_FILES["picture"];
        $tmpPath = $uploadedPicture["tmp_name"];
        $dstPath = "./img/";
        $infoPic = [
            "tmpPath" => $tmpPath,
            "uploadedPicture" => $uploadedPicture
        ];
        function fileUpload($tmpPath, $dstPath, $uploadedPicture) {
            // print_r($uploadedPicture);
            if (move_uploaded_file($tmpPath, $dstPath.$uploadedPicture["name"])) {
                return true;
            } else {
                return false;
            }
        }
        $result = fileUpload($tmpPath, $dstPath, $uploadedPicture);
        if ($result == true && file_exists("./imgPaths/paths.txt") == false) {
            $mainArray = [];
            $fileData = fopen("./imgPaths/paths.txt", "w");
            array_push($mainArray, $infoPic);
            fwrite($fileData, json_encode($mainArray));
            fclose($fileData);
        } else if ($result == true && file_exists("./imgPaths/paths.txt") == true) {
            echo "done";
            $fileData = fopen("./imgPaths/paths.txt", "r");
            $stringData = fread($fileData, filesize("./imgPaths/paths.txt"));
            $mainArray = json_decode($stringData, true);
            fclose($fileData);

            array_push($mainArray, $infoPic);
            print_r($infoPic);
            $fileData = fopen("./imgPaths/paths.txt", "w");
            fwrite($fileData, json_encode($mainArray));
            fclose($fileData);
        } else {
            echo "something happened";
        }
        
        
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
</head>
<body>
    <a href="pictures.php">show all pictures in folder</a>
</body>
</html>