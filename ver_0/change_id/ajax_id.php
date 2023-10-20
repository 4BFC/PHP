<?php

$id = $_GET['id'];

?>
<!DOCTYPE html>
<html>

<head>
  <title>Change PHP ID Example</title>
</head>

<body>
  <button onclick="changeID()">Change ID</button>
  <p>Current PHP ID: <span id="phpId"><?= $id ?></span></p>

  <script>
    function changeID() {
      let newId = prompt("input");
      console.log(newId);
      // AJAX를 사용하여 서버에 새 ID 요청
      var xhr = new XMLHttpRequest();
      var newURL = window.location.href.split('?')[0] + "?id=" + newId;
      window.location.href = newURL;
      xhr.open("GET", newURL, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var newId = xhr.responseText;
          document.getElementById("phpId").textContent = newId;
        }
      };
      xhr.send();
    }
  </script>
</body>

</html>