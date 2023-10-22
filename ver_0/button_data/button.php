<?php
echo "CONTACT!";
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'test'
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>send_DATA_button</title>
</head>

<body>
  <h1>Click BUTTON</h1>
  <form action="process_data.php" method="POST">
    <!-- js에서 해당 언어를 찾고 값을 정의하고 process_data.php 로 값을 전달한다.-->
    <input type="hidden" name="hidden_text" class="hidden_text" placeholder="input text">

    <input type="button" class="newbtn" value="new value">
    <input type="submit" class="btn" value="Click!">
  </form>

  <script src="./data.js"></script>
</body>

</html>