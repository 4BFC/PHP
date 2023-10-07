<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
//$list 변수는 body태그의 ol태그 목록으로 활용하기 위해서 만든 변수이다. 해당 변수를 활용하기 위해서는 아래 while문을 보면 알 수 있다. 앞서 우리가 while문의 조건문에서 사용된 함수를 활용했던 것과 같은 방식이다. 다만 $list변수를 활용하는 부분을 유의깊게 확인해보고 다시 볼 필요가 있다.
$list = "";
while ($row = mysqli_fetch_array($result)) {
  $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}
//어떻게 값이 GET이 되는지 확인을 해볼 필요가 있다. 아마 해당 부분을 눌렀을 때 POST방식으로 값을 전달하는 부분이 있을 것이다. 그부분을 다시 확인해볼 필요가 있다.
//아마도 a태그의 href(하이퍼링크)를 통해서 url값을 전달하면서 자동적으로 POST가 기본으로(default) 설정이 되어 있을 것이다. 따라서 해당 태그를 선택할 시에 id값이 GET할 수 있게 되는 것이다.(확인이 필요)
$sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
echo $sql;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB</title>
</head>

<body>
  <h1>WEB</h1>
  <ol>
    <?= $list ?>
  </ol>
  <a href="create.php">create</a>
  <h2>Welcome</h2>
  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, voluptatum.
</body>

</html>