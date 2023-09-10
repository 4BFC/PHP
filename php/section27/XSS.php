<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>XSS</title>
</head>

<body>
  <h1>Cross site scripting</h1>
  <?php
  echo '<script>alert("baboo");<script>'
  ?>
</body>

</html>