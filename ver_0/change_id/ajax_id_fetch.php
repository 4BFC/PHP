<!DOCTYPE html>
<html>

<head>
  <title>Change URL with Fetch API</title>
</head>

<body>
  <input type="text" id="newIdInput" placeholder="Enter a new ID">
  <button id="changeURLButton">Change URL</button>

  <script>
    document.getElementById("changeURLButton").addEventListener("click", function() {
      let newId = document.getElementById("newIdInput").value;
      if (newId) {
        let newURL = window.location.href.split('?')[0] + "?id=" + newId;

        fetch(newURL, {
            method: "GET"
          })
          .then(response => {
            if (response.status === 200) {
              console.log("URL changed successfully.");
              window.location.href = newURL;
            } else {
              console.error("An error occurred. Status: " + response.status);
            }
          })
          .catch(error => {
            console.error("An error occurred: " + error.message);
          });
      }
    });
  </script>
</body>

</html>