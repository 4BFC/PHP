<!DOCTYPE html>
<html>

<head>
  <title>Change URL with Ajax</title>
</head>

<body>
  <input type="text" id="newIdInput" placeholder="Enter a new ID">
  <button id="changeURLButton">Change URL</button>

  <script>
    let errorMg = '';
    document.getElementById("changeURLButton").addEventListener("click", function() {
      try {
        var newId = document.getElementById("newIdInput").value;
        if (newId) {
          var xhr = new XMLHttpRequest();
          // var url = window.location.href; // 서버 스크립트 URL로 변경
          // url += "?id=" + newId;
          // console.log(window.location.href);
          var newURL = window.location.href.split('?')[0] + "?id=" + newId;
          window.location.href = newURL;
          xhr.open("GET", newURL, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              console.log("URL changed successfully.");
            }
          };

          xhr.send();
        }
      } catch (error) {
        errorMg = error.message;
        console.error("An error occurred: " + errorMg);
      }
    });
    console.log(errorMg.message);
  </script>
</body>

</html>