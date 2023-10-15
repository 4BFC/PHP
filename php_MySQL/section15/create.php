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

$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name="author_id">';
while ($row = mysqli_fetch_array($result)) { //
  $select_form .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
} //여기서 $select_form변수는 value값을 process_create.php로 전달 받아야한다. 만약 value의 값을 설정하지 않고 POST로 전달하게 된다면 row['name']값이 process_create.php로 전달이 되고 그 곳에선 'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])라는 array 부분에서 $filtered['author_id']로 string문이 전달되며 이후 sql에서 해당 author_id의 colum값(INT)와 type이 맞지 않아 저장함에 문제가 발생할 수 밖에 없다.
//.= 는 이전에 가지고 있던 변수의 값을 더해서 새로 대입한는 값을 이어붙히라는 문법이다.
$select_form .= '</select>';
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
  <form action="process_create.php" method="POST">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <?= $select_form ?>
    <p><input type="submit"></p>
  </form>
</body>

</html>