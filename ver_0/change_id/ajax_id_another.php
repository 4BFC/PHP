<!DOCTYPE html>
<html>

<head>
  <title>Change URL with Ajax</title>
</head>

<body>
  <input type="text" id="newIdInput" placeholder="Enter a new ID">
  <button id="changeURLButton">Change URL</button>

  <script>
    document.getElementById("changeURLButton").addEventListener("click", function() {
      try {
        let newId = document.getElementById("newIdInput").value;
        if (newId) {
          let xhr = new XMLHttpRequest();
          // var url = window.location.href; // 서버 스크립트 URL로 변경
          // url += "?id=" + newId;
          // console.log(window.location.href);
          let newURL = window.location.href.split('?')[0] + "?id=" + newId;

          xhr.open("GET", newURL, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              console.log("URL changed successfully.");
              window.location.href = newURL;
            }
          };

          xhr.send();
        }
      } catch (error) {
        console.error("An error occurred: " + error.message);
      }
    });
  </script>
</body>

</html>