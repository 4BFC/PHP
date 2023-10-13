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
    </tr>
  <?php
      }
  ?>
  </tr>
  </table>
  <form action="process_create_author.php" method='POST'>
    <p><input type="text" name="name" placeholder="name"></p>
    <p><textarea name="profile" placeholder="profile"></textarea></p>
    <p><input type="submit" value="Create author"></p>
  </form>
</body>

</html>