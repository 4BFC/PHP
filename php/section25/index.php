<?php
function print_title()
{
  if (isset($_GET['id'])) {
    echo $_GET['id'];
  } else {
    echo "Welcome";
  }
}

function print_description()
{
  if (isset($_GET['id']) && !$_GET['id'] == '') {
    echo file_get_contents("data/" . $_GET['id']);
  } else if (isset($_GET['id']) && $_GET['id'] == '') {
    echo "Empty description. Retry!";
  } else {
    echo "Hello, PHP";
  }
}

function print_list()
{
  $list = scandir('data'); // 해당 디렉토리 안에 있는 파일을 list라는 변수 안에 담아 둔다.
  $i = 0;

  while ($i < count($list)) {

    //count 함수를 통해서 해당 list의 leng길이를
    if ($list[$i] != '.') {
      if ($list[$i] != '..') {
?>
        <li><a href="index.php?id=<?= $list[$i] ?>"><?= $list[$i] ?></a></li>
<?php
      }
    }
    $i = $i + 1;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    print_title();
    ?>
  </title>
</head>

<body>
  <h1><a href="index.php">WEB</a></h1>
  <ol>
    <?php
    print_list();
    ?>
  </ol>
  <a href="create.php">create</a>
  <?php if (isset($_GET['id'])) { ?>
    <!-- 리스트 목록을 클릭하고 주소에 해당 아이디가 있을 경우를 의미한다. -->
    <a href="update.php?id=<?php echo $_GET['id']; ?>">update</a>
    <form action="delete_process.php" method="post">
      <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
      <input type="submit" value="delete">
    </form>
  <?php } ?>
  <h2>
    <?php
    print_title();
    ?>
  </h2>
  <?php
  print_description();
  ?>
</body>

</html>