<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);

$filtered = array(
  'location' => mysqli_real_escape_string($conn, $_POST['접속_위치'])
);

$sql = "
INSERT INTO contactlog (사용자_이름, 접속_날짜, 접속_위치)
VALUES(
  'user1',
  NOW(),
  '{$filtered['location']}}'
  )
";
die();
echo "check your DATABASE!";
