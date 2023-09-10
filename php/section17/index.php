<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Array</h1>
  <?php
  $coworkers = array('egoing', 'leezche', 'durn', 'taeho');
  echo $coworkers[1] . '<br>';
  echo $coworkers[3] . '<br>';
  ?>
  <?php var_dump(count($coworkers)); //int(4)
  ?>
  <?php array_push($coworkers, 'graphittie');
  ?>
  <?php var_dump($coworkers); //array(5)
  ?>
</body>

</html>