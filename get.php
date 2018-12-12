<?php
require_once 'connection.php';
$ds='sd';
$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
  printf("cannot connect to db. Error = %s", mysqli_connect_error());
  exit;
}

$query = "SELECT * FROM rooms";

$result = mysqli_query($link, $query);
if ($result) {
  $rows = mysqli_num_rows($result); // количество полученных строк

  printf ("<table><tr><th>ID</th><th>Room</th><th>Client</th><th>Stage</th><th>Type</th><th>View</th><th>Price</th></tr>");
  for ($i = 0 ; $i < $rows ; ++$i)
  {
      $row = mysqli_fetch_row($result);
      printf("<tr>");
          for ($j = 0; $j < 7 ; ++$j) printf("<td>$row[$j]</td>");
      printf("</tr>");
  }
  printf("</table>");
  printf("<a role='button' class='btn btn-primary btn-lg' href='index.html'>Home</a>");
} else {
  echo "No information";
}

mysql_free_result($result);
?>
