<!-- PHP_zone -->
<?php
echo "HERE IS Link_B page!!<br>BUT DON'T HAVE DATA";
$id = $_GET["id"];
?>

<!-- HTML_zone -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Link_B</title>
</head>

<body>
  <h1>ID is "<?= $id ?>"</h1>

  <h3>GET value</h3>
  <hr>
  <form action="get_value.php" method="GET">
    <input type="text" placeholder="value">
    <input type="submit" value="submit">
  </form>

  <a href="../contact_URL.php">BACK</a>
</body>

</html>