<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'phpmysql'
);
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
  <p><a href="index.php">topic</a></p>
  <table border="1">
    <tr>
      <td>id</td>
      <td>name</td>
      <td>profile</td>
      <td></td>

      <?php
      $sql = "SELECT * FROM author";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $filtered = array(
          'id' => htmlspecialchars($row['id']),
          'name' => htmlspecialchars($row['name']),
          'profile' => htmlspecialchars($row['profile']),
        )
      ?>

    <tr>
      <td><?= $filtered['id'] ?></td>
      <td><?= $filtered['name'] ?></td>
      <td><?= $filtered['profile'] ?></td>
      <td><a href="author.php?id=<?= $filtered['id'] ?>">update</a></td>
      <td>
        <form action="process_delete_author.php" method="POST" onsubmit="if(!confirm('sure?')){return false;}">
          <input type="hidden" name="id" value="<?= $filtered['id'] ?>">
          <!-- {<?= $filtered['id'] ?>} 여기서 괄호를 넣고 안놓고에 따라서 데이터를 전송할 수 있고 없고가 결정된다. -->
          <input type="submit" value="delete">
        </form>
      </td>
    </tr>

  <?php
      }
  ?>
  </tr>
  </table>

  <?php
  $escaped = array(
    'name' => '',
    'profile' => ''
  );

  $label_submit = 'Create author'; //해당 id값이 없을 경우에는 해당 구문으로
  $form_author = 'process_create_author.php'; //해당 id값이 없을 경우에는 해당 구문으로
  $form_id = '';
  if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['profile'] = htmlspecialchars($row['profile']);
    $label_submit = 'Update author';
    $form_author = 'process_update_author.php';
    $form_id = '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
  }
  ?>

  <form action="<?= $form_author ?>" method='POST'>
    <!-- 동적으로 값들이 변할 수 있게 설정 -->
    <?= $form_id ?>
    <p><input type="text" name="name" placeholder="name" value="<?= $escaped['name'] ?>"></p>
    <p><textarea name="profile" placeholder="profile"><?= $escaped['profile'] ?></textarea></p>
    <p><input type="submit" value="<?= $label_submit ?>"></p>
  </form>
</body>

</html>