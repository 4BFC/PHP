<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>function</h1>
  <?php
  $str = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
  
  Beatae totam impedit corporis, sapiente omnis ut amet, porro explicabo nobis reprehenderit odio perferendis cumque. Facilis nostrum, dolor reprehenderit eligendi officia exercitationem!";
  echo $str;
  ?>
  <h2>strlen()</h2>
  <?php
  echo strlen($str);
  ?>
  <h2>nl2br</h2>
  <?php
  echo nl2br($str);
  ?>
</body>

</html>