<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>api_test2</title>
</head>
<body>
    <?php
        $url = "https://db.ygoprodeck.com/api/v7/cardinfo.php";

        $options = array(
            "http" => array(
                "method" => "GET",
                "header" => "Content--type: application/json; cahrset=UTF-8"
            )
        );

        $context = stream_context_create($options);
        $raw_data = file_get_contents($url, false, $context);//file_get_contentsは第一引数に指定したパスから文字列を読み取る。第三引数はstream_context_createで作ったコンテキストリソースを指定する。
        $data = json_decode($raw_data, true);

        echo "<table>";
        echo "<tr>";
        echo "<th>name</th>";
        echo "<th>price</th>";


        $keyBox = [];
        $src;
        foreach($data["data"][10000] as $key => $value) {
            if(is_array($value)) {
                foreach($value as $key2 => $column) {
                    if(is_array($column)) {
                        foreach($column as $key3 => $column2) {
                            echo "<p>$key3 : $column2<p/>";
                            $keyBox[$key3] = $column2;
                            if ($key3 == "image_url") {
                                $src = $column2;
                            }
                        }
                    } else {
                        echo "<p>$key2 : $column<p/>";
                        $keyBox[$key2] = $column;
                    }
                }
            } else {
                echo "<p>$key : $value<p/>";
                $keyBox[$key] = $value;
            }
        }

        $dataArray;
        $fileData = fopen("./data/ygo.txt", "w");
        $jsonString = fwrite($fileData, $raw_data);
        fclose($fileData);
        echo "</tr>";
        echo "</table>";
        echo "<img src=" . $src . ">";

    ?>
</body>
</html>