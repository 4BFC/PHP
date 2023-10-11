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
$list = "";

while ($row = mysqli_fetch_array($result)) {
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
  'title' => 'Welcome',
  'description' => 'Hello, web'
);
$update_link = '';
$delete_link = '';
if (isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  // <a href="update.php?id="></a>
  $update_link = '<a href="update.php?id=' . $_GET['id'] . '">update</a>';
  // delete방식은 해당 URL 매개변수의 값을 가져오는 것이아니다. 은밀하게 접근해서 해당 데이터값을 삭제해야하기 때문에 GET이 아닌 POST방식을 사용해야 한다. 따라서 from태그를 이용해서 삭제를 할 것이다.
  //그렇다면 아래 코드 GET을 POST로 변경하면 되는 것 아닌가?
  // $delete_link = '<a href="process_delete.php?id=' . $_GET['id'] . '">delete</a>';
  //해당 form태그를 이용해서 안에 input태그는 GET을 사용하는데.. 무슨 차이인지 모르겠다.
  // 여기서 hidden을 사용하는 이유는?
  $delete_link = '
  <form action = "process_delete.php" method="post">
  <input type="hidden" name="id" value="' . $_GET['id'] . '">
  <input type="submit" value ="delete">
  </form>
  ';
}
?>

<!DOCTYPE html>
<html lang="eng">

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
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
</body>

</html>