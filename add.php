<?php
  require_once 'connection.php';

    if (isset($_POST["fnamen"]) && isset($_POST["lnamen"]) && isset($_POST["gendern"]))  {
    $fname = htmlentities($_POST["fnamen"]);
    $lname = htmlentities($_POST["lnamen"]);
    $gender = htmlentities($_POST["gendern"]);
    $born = htmlentities($_POST["bornn"]);
    $stage = htmlentities($_POST["stagen"]);
    $room = htmlentities($_POST["roomn"]);
    $type = htmlentities($_POST["typen"]);
    $view = htmlentities($_POST["viewn"]);
    $price = htmlentities($_POST["pricen"]);
  } else {
    echo "enter fields";
  }

  $link = mysqli_connect($host, $user, $password, $database);
  if (!$link) {
    printf("cannot connect to db. Error = %s", mysqli_connect_error());
    exit;
  }

  $query1 = "INSERT INTO rooms VALUES(NULL,'$room','$lname','$stage','$type','$view','$price')";
  $query2 = "INSERT INTO clients VALUES(NULL, '$fname', '$lname', '$born', '$gender')";

  $result1 = mysqli_query($link, $query1) or die("error enter room" . mysqli_error($link));
  $result2 = mysqli_query($link, $query2) or die("error enter client" . mysqli_error($link));
  if ($result1 && $result2){
    echo "room and client registered";
  }
  mysqli_close($link);

?>
