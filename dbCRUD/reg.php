<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $tbName = 'test1';

        $dbcon = new mysqli('localhost', 'root', '', 'test_db');
        // $cmd = "INSERT INTO $tbName (fname, lname, email, pass) VALUES ('riku', 'hatano', 'lutianye@com', '0822adgj')";
        $cmd = "INSERT INTO $tbName (fname, lname, email, pass) VALUES ('$fname', '$lname', '$email', '$pass')";
        $dbcon -> query($cmd);
        

        $return = $dbcon -> query("SELECT * FROM $tbName");
        // var_dump($return);
        $returns = $return -> fetch_all();

        var_dump($returns);
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
            foreach ($return as $eachReturn) {
                echo "<tr>";
                    echo "<td>".$eachReturn['id']."</td>";
                    echo "<td>".$eachReturn['fname']."</td>";
                    echo "<td>".$eachReturn['lname']."</td>";
                    echo "<td>".$eachReturn['email']."</td>";
                    echo "<td>".$eachReturn['pass']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>