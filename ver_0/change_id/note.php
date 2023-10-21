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
        var newId = document.getElementById("newIdInput").value;
        if (newId) {
          var xhr = new XMLHttpRequest();
          var newURL = window.location.href.split('?')[0] + "?id=" + newId;

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