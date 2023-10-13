<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);

$filtered = array(
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description']),
  'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
);
$sql = "
  INSERT INTO topic(title, description, created, author_id)
  VALUES(
    '{$filtered['title']}',
    '{$filtered['description']}',
    NOW(),
    {$filtered['author_id']}
  )
";

//die를 사용함으로서 데이터가 전송되던 값을 중간에 확인 할 수 있다.
// die($sql);
$result = mysqli_query($conn, $sql);

if ($result === false) {
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
  echo mysqli_error($conn);
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다.<a href="index.php">돌아가기</a>';
}
