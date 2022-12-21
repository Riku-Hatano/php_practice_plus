<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $tbName = 'test1';

        $dbcon = new mysqli('localhost', 'root', '', 'test_db');
        $cmd = "INSERT INTO $tbName (fname, lname, email, pass) VALUES ('$fname', '$lname', '$email', '$pass')";
        $dbcon -> query($cmd);
        
        
        $return = $dbcon -> query("SELECT * FROM $tbName");
        $returns = $return -> fetch_all();
        
        print_r($returns);
        header("Location: ./index.php");
    }
?>

<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>fname</th>
            <th>lname</th>
            <th>email</th>
            <th>pass</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // foreach ($return as $eachReturn) {
            //     echo "<tr>";
            //         echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=id '>".$eachReturn['id']."</td>";
            //         echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=fname '>".$eachReturn['fname']."</td>";
            //         echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=lname '>".$eachReturn['lname']."</td>";
            //         echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=email '>".$eachReturn['email']."</td>";
            //         echo "<td><a href=' ".$_SERVER['PHP_SELF']."?changeInfo=pass '>".$eachReturn['pass']."</td>";
            //     echo "</tr>";
            // }
            // $dbcon -> close();
        ?>
    </tbody>
</table>