<?php
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $nationality = $_POST['nationality'];

  print_r($_POST);

  if ($id === '' || $fname === '' || $lname === '' || $nationality === '') {
    header('Location: index.php');
    exit();
  }

  $dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
  $user = 'riku';
  $password = '0822adgj';

  try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $db->prepare(
      "
        INSERT 
        INTO 
          firstTable
        (
          id
        , fname
        , lname
        , nationality
        ) VALUES (
          :id
        , :fname
        , :lname
        , :nationality
        )
      "
    );

    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':nationality', $nationality, PDO::PARAM_STR);

    $stmt->execute();

    header('Location: index.php');
    exit();
  } catch(PDOException $e) {
    die('エラー：' . $e->getMessage());
  }
?>