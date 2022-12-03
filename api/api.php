<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>api_test</title>
</head>
<body>
    <?php
        // APIアクセスURL
        // $url = 'https://umayadia-apisample.azurewebsites.net/api/persons';
        $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php';
        
        // ストリームコンテキストのオプションを作成
        $options = array(
            // HTTPコンテキストオプションをセット
            'http' => array(
                'method'=> 'GET',
                'header'=> 'Content-type: application/json; charset=UTF-8' //JSON形式で表示
            )
        );
        
        // ストリームコンテキストの作成
        $context = stream_context_create($options);
        
        $raw_data = file_get_contents($url, false,$context);
        
        // debug
        //var_dump($raw_data);
        
        // json の内容を連想配列として $data に格納する
        $data = json_decode($raw_data,true);
    ?>
        <table>
            <tr>
                <th>name</th>
                <th>price</th>
            </tr>
            <?php foreach($data as $key => $value){ // 連想配列を取り出す ?>
                <?php if(is_array($value)){ // 値が配列のみループで回して表示 ?>
                    <?php foreach($value as $column){ ?>
                    <tr>
                        <td><?php echo $column['name']; ?></td>
                        <td><?php echo $column['card_prices'][0]["cardmarket_price"]; ?></td>
                    </tr>
                   <?php } ?>
                <?php } ?>
            <?php } ?>
        </table>
    ?>
</body>
</html>