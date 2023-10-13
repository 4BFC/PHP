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
  <form action="process_update.php" method="POST">
    <!-- 여기에는 process_update.php 파일에서 update를 처리해야한다. 띠라서 아래 hidden의 input태그가 활성화 된다. -->
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <!-- 여기 update.php와 create.php파일을 비교해서 보면 각 input태그가 다르게 설정 되어 있는 것을 알 수 있다. 우선 $article 변수가  -->
    <p><input type="text" name="title" placeholder="title" value="<?= $article['title'] ?>"></p>
    <p><textarea name="description" placeholder="description"><?= $article['description'] ?></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>

</html>