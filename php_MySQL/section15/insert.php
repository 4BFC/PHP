<?php
// mysql에 접속하겠다는 함수이다.
$conn = mysqli_connect("localhost", "root", "1024", "phpmysql");
$sql =  "
INSERT INTO topic 
  (title, description, created)
    VALUE(
      'MySQL',
      'MySQL is ..',
      NOW()
    )
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo mysqli_error($conn);
}
