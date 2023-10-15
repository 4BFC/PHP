<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);

$sql = "SELECT * FROM topic"; // WHERE id = 8
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
  echo '<h2>' . $row['title'] . '</h2>';
  echo $row['description'];
}
if ($row === NULL) {
  echo "\nit's NULL!!";
}
