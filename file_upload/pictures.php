<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all pictures</title>
</head>
<body>
    <?php
        $fileData = fopen("./imgPaths/paths.txt", "r");
        $pathString = fread($fileData, filesize("./imgPaths/paths.txt"));
        $decodedString = json_decode($pathString, true);
        print_r($decodedString);
        foreach($decodedString as $path) {
            $src = "./img/".$path["uploadedPicture"]["name"];
            echo "<img src='$src'>";
        }
    ?>
</body>
</html>