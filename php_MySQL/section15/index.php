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
  // $row["id"]값을 통해서 우리는 MySQL의 데이터 값인 row(열)에 있는 값들을 반복문을 통해서 가져오는 것이다.
  $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
  'title' => 'Welcome',
  'description' => 'Hello, web'
);
$update_link = '';
$delete_link = '';
$author = '';
//GET ID가 중어지면 해당 값의 데이터를 전송
if (isset($_GET['id'])) {
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $article['name'] = htmlspecialchars($row['name']);

  $update_link = '<a href="update.php?id=' . $_GET['id'] . '">update</a>';
  $delete_link = '
  <form action = "process_delete.php" method="post">
  <input type="hidden" name="id" value="' . $_GET['id'] . '">
  <input type="submit" value ="delete">
  </form>
  ';
  $author = "<p>by" . $article['name'] . "</p>";
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
  <a href="author.php">author</a>
  <ol>
    <?= $list ?>
  </ol>

  <p><a href="create.php">create</a></p>
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
  <?= $author ?>
</body>

</html>