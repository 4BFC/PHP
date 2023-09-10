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