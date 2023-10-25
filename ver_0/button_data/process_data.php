<?php
echo "CONTACT!";
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'test'
);

$filtered = array(
  'num' => mysqli_real_escape_string($conn, $_POST['hidden_num']),
  'text' => mysqli_real_escape_string($conn, $_POST['hidden_text'])
);

$sql = "
INSERT INTO btndata(num,text,시간)
VALUES(
  '{$filtered['num']}',
  '{$filtered['text']}',
  NOW()
)
";
$result = mysqli_query($conn, $sql);

if ($result === false) {
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
  echo mysqli_error($conn);
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다.<a href="button.php">돌아가기</a>';
}
