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
  <h1>ID is "<?= $id ?>"</h1>

  <h2>Select type</h2>
  <a href="Link_get.php?id=get_type">GET</a>
  <a href="Link_post.php?id=post_type">POST</a>
  <br><br>
  <a href="../contact_URL.php">BACK</a>
</body>

</html>