<!-- PHP_zone -->
<?php
echo "HERE IS Link_A page!!<br>BUT DON'T HAVE DATA";
$id = $_GET['id'];

?>

<!-- HTML_zone -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Link_A</title>
</head>

<body>
  <h1>"<?= $id ?>"</h1>

  <h2>Select type</h2>
  <a href="Link_get.php?id=get_type">GET</a>
  <a href="Link_post.php?id=post_type">POST</a>

  <h3>GET value</h3>
  <hr>
  <form action="get_value.php" method="GET">
    <input type="text" name="id" placeholder="value">
    <input type="submit" value="submit">
  </form>

  <a href="./Link_A.php?id=Link_A">BACK</a>
</body>

</html>