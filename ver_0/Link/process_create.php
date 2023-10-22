<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'ver_0'
);

$filtered = array(
  'location' => mysqli_real_escape_string($conn, $_POST['location'])
);

$sql = "
INSERT INTO contactlog (사용자_이름, 접속_날짜, 접속_위치)
VALUES(
  'user1',
  NOW(),
  '{$filtered['location']}'
  )
";

$result = mysqli_query($conn, $sql);

if ($result === false) {
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.<br> check your DATABASE!';
  echo mysqli_error($conn);
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다.<a href="Link_A.php">돌아가기</a>';
}
