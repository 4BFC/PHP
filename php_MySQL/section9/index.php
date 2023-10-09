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

$article = array(
  'title' => 'Welcome',
  'description' => 'Hello, web'
);
#만약 id가 주소에 isset이 되었다면 $sql 변수 값이 해당 주소의 맞는 데이터를 전달한다.
if (isset($_GET['id'])) {
  //$_GET['id']의 id는 URL에서의 매개변수의 값이다. 즉, URL의 매개변수의 값이 id가 해당 하면 TRUE를 반환하고 아래 조건들이 발생한다.
  $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result = mysqli_query($conn, $sql); //데이터베이스에 접속하는 함수이다. 이를 통해서 CRUD를 할 수 있다.
  $row = mysqli_fetch_array($result); //이 이함수는 쿼리 결과에서 다음 행의 데이터를 배열 형태로 반환한다.
  $article['title'] = $row['title']; //해당 if문이 발동하지 않으면 $article변수가 유지된다.
  $article['description'] = $row['description'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB</title>
</head>

<body>
  <h1><a href="index.php">WEB</a></h1>
  <ol>
    <?= $list ?>
  </ol>
  <a href="create.php">create</a>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
</body>

</html>