<!DOCTYPE html>
<html>

<head>
  <title>Change PHP URL ID Example</title>
</head>

<body>
  <button onclick="get_URL()">GET</button>
  <button onclick="post_URL()">POST</button>


  <script>
    var currentURL = window.location.href;
    let id = "";
    console.log(currentURL);

    function changeURLId() {
      var newId = prompt("Enter a new ID:"); // 사용자로부터 새 ID 입력 받음
      if (newId !== null && newId !== "") {
        //window.location.href코드를 통해서 현재 URL주소 값을 확인 할 수있다.
        var currentURL = window.location.href;
        var newURL = currentURL.replace(/(\?|&)id=[^&]*/, "") + (currentURL.indexOf("?") >= 0 ? "&" : "?") + "id=" + newId;
        window.location.href = newURL;
        // window.location.href = currentURL + "?id=" + newId;
      }
    }
    get_URL = () => {
      //if문을 사용해서 반복적인 입력으로 URL 값이 추가 되지 않게 해야한다.
      id = "getURL"
      window.location.href = currentURL + `?id=${id}`;
      console.log("GET");
    }
    post_URL = () => {
      id = "postURL"
      window.location.href = currentURL + `?id=${id}`;
      console.log("POST");
    }
  </script>
</body>

</html>