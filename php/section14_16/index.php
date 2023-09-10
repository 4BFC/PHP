<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1><a href="index.php">WEB</a></h1>
  <ol>
    <?php
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
    ?>
  </ol>
  <h2>
    <?php
    if (isset($_GET['id'])) {
      echo $_GET['id'];
    } else {
      echo "Welcome";
    }
    ?>
  </h2>
  <?php

  if (isset($_GET['id'])) {
    echo file_get_contents("data/" . $_GET['id']);
  } else {
    echo "Hello, PHP";
  }
  ?>
</body>

</html>