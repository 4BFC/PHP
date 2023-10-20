<!DOCTYPE html>
<html>

<head>
  <title>Change PHP ID Example</title>
</head>

<body>
  <button onclick="changeID()">Change ID</button>
  <p>Current PHP ID: <span id="phpId">123</span></p>

  <script>
    function changeID() {
      // JavaScript를 사용하여 ID 변경
      var newId = 456; // 원하는 새로운 ID로 변경

      // 서버에 변경된 ID를 전달
      // 이 부분에서 서버로 변경된 ID를 전송할 수 있습니다.

      // 화면에 변경된 ID 표시
      document.getElementById("phpId").textContent = newId;
    }
  </script>
</body>

</html>