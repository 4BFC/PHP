<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);

$filtered = array(
  'name' => mysqli_real_escape_string($conn, $_POST['name']),
  'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
);
$sql = "
  INSERT INTO author(name, profile)
  VALUES(
    '{$filtered['name']}',
    '{$filtered['profile']}'
  )
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
  echo mysqli_error($conn);
  error_log(mysqli_error($conn));
} else {
  // echo '성공했습니다.<a href="author.php">돌아가기</a>';
  header('Location: author.php'); //리다이렉션 방법
}
