<?php
    $dbcon = new mysqli('localhost', 'root', '', 'test_db');
    $cmd = "SELECT * FROM test1";
    $return = $dbcon -> query($cmd);
    $returns = $return -> fetch_all();

    $cmdC = "SELECT * FROM test2";
    $data = $dbcon -> query($cmdC);
    $data2 = $data -> fetch_all();
    // print_r($returns);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./reg.php" method="POST">
        <input type="text" name="fname" placeholder="fname">
        <input type="text" name="lname" placeholder="lname">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="pass" placeholder="pass">
        <input type="number" name="cNum" placeholder="class number">
        <input type="submit" value="submit">
    </form>
    <form action="./regC.php" method="POST">
        <input type="text" name="cName" placeholder="cname">
        <input type="text" name="rName" placeholder="rname">
        <input type="text" name="comments" placeholder="comments">
        <input type="submit" value="submit class">
    </form>
    <form action="delete.php" method="POSt">
        <input type="number" name="deleteId" placeholder="delete id">
        <input type="submit" value="delete">
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>full name</th>
                <th>email</th>
                <th>password</th>
                <th>cnum</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($returns as $eachData) {
                    echo "<tr>";
                        echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=id '>".$eachData[4]."</td>";
                        echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=fname '>".$eachData[0]." ".$eachData[1]."</td>";
                        echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=email '>".$eachData[2]."</td>";
                        echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=pass '>".$eachData[3]."</td>";
                        echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=pass '>".$eachData[5]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>cname</th>
                <th>rname</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data2 as $eachData) {
                    echo "<tr>";
                        echo "<td> ".$eachData[2]." </td>";
                        echo "<td> ".$eachData[0]." </td>";
                        echo "<td> ".$eachData[1]." </td>";
                    echo "</tr>";
                }
                $dbcon -> close();
            ?>
        </tbody>
    </table>
</body>
</html>