<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);
//settype을 사용하는 이유는 $_POST의 id값을 정수로 고정하기 위한 함수이다.
settype($_POST['id'], 'integer');
// 여기 array의 역할에서 id 배열을 추가해준다. 여기서 filtered의 역할은?
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id']),
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
  UPDATE topic
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    WHERE
      id = {$filtered['id']}
";
$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다.<a href="index.php">돌아가기</a>';
}
