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
if (isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  // <a href="update.php?id="></a>
  $update_link = '<a href="update.php?id=' . $_GET['id'] . '">update</a>';
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
  <!-- 위의 update_link는 해당 if문의 t/f에 따라서 활성화의 여부가 따른다. 즉, URL에서 매개변수 id값이 주어지면 해당 update a태그가 활성화가 되는 것이다. 이후 update.php파일로 넘어가서 html코드를 살펴보자. -->
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
</body>

</html>