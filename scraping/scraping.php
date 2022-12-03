<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test/scraping</title>
</head>
<body>
<?php
    $dom = new DOMDocument('1.0', 'UTF-8');
    $html = file_get_contents("https://vancouver.craigslist.org/search/apa");
    // $html = file_get_contents("https://pig-data.jp/usecase/pigexample16/");
    $dom->loadHTML($html);
    $eachTag = DOMDocument::getElementByClassName("result-row");
    print_r($eachTag);
    $xpath = new DOMXpath($dom);

    foreach($xpath->query('//h2') as $node){ //h2の部分を変更することで他のタグなど指定が可能
    echo "<p>";
    echo $node->nodeValue; //h2の内容を1つずつ表示させる
    echo "</p>";
    // result-row calssname
 }
?>
</body>
</html>