<?php
require_once 'connection.php';

if(isset($_POST["roomn"])) {
  $roomid = htmlentities($_POST["roomn"]);
} else {
  echo "Enter the id of room";
}

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
  printf("cannot connect to db. Error = %s", mysqli_connect_error());
  exit;
}

$queryget = "SELECT * FROM rooms where id='$roomid'";

$resultget = mysqli_query($link, $queryget) or die("error enter room id" . mysqli_error($link));

$rowcli = mysqli_fetch_row($resultget);
if (!$rowcli) {
  echo "cannot find client";
  printf("<br><a role='button' class='btn btn-primary btn-lg' href='index.html'>Home</a>");
}
else {
  $queryset1 = "DELETE FROM rooms where id='$roomid'";
  $queryset2 = "DELETE FROM clients where lname='$rowcli[2]'";

  $resultset1 = mysqli_query($link, $queryset1) or die("error cannot delet room" . mysqli_error($link));
  $resultset2 = mysqli_query($link, $queryset2) or die("error cannot delete client" . mysqli_error($link));
  if ($resultset1 && $resultset2){
    echo "client was deleted";
  }
  printf("<br><a role='button' class='btn btn-primary btn-lg' href='index.html'>Home</a>");
}
mysqli_close($link);
?>
