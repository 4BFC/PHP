<!-- PHP_zone -->
<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect(
  'localhost',
  'root',
  '1024',
  'ver_0'
);

$sql = "SELECT * FROM contactlog";
$result = mysqli_query($conn, $sql);

$check = "";

if ($conn) {
  $check = "CONTACT DATA!<br>";
} else {
  $check = "<h1>CAN'T LOAD DATA</h1><br>Check this your DATABASE!!";
}
?>

<?php
$title = "";
$id = "";
if ($id != "") {
  $id = $_GET['id'];
  $title = "<h1>ID is $id </h1>";
} else {
  $title = "<h1>Don't have ID</h1>";
}
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
  <script>
    let now = new Date();
    let y = now.getFullYear();
    let m = now.getMonth();
    let d = now.getDate();
    let h = now.getHours();
    let min = now.getMinutes();
    let s = now.getSeconds();

    //프로퍼티
    let log_data = {
      name: "user_1",
      data: "contact_WHERE:?location=NoDATA/",
      date: `${y}-${m}-${d},${h}:${min}:${s}`
    }
    console.log(`[${log_data.name}],[${log_data.date}],[${log_data.data}]`);
  </script>
  <script>
    let location_value = document.querySelector("#input_location").value = "Tokyo";
  </script>

  <h2>Select type</h2>
  <?= $check ?>
  <?= $title ?> <br>

  <a href="Link_get.php?id=get_type">GET</a>
  <a href="Link_post.php?id=post_type">POST</a>
  <form action="./process_create.php" method="POST" onsubmit="alert('Check your Click! : ');">
    <input type="hidden" id="input_location" name="location" value="Tokyo">
    <p><input type="submit"></p>
  </form>

  <br><br>
  <a href="../contact_URL.php">BACK</a>
</body>

</html>