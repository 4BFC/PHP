<!DOCTYPE html>
<html>

<head>
  <title>Change PHP URL ID Example</title>
</head>

<body>
  <button onclick="changeURLId()">Change URL ID</button>

  <script>
    var currentURL = window.location.href;
    console.log(currentURL);

    function changeURLId() {
      var newId = prompt("Enter a new ID:"); // 사용자로부터 새 ID 입력 받음
      if (newId !== null && newId !== "") {
        //window.location.href코드를 통해서 현재 URL주소 값을 확인 할 수있다.
        var currentURL = window.location.href;
        //currentURL.replace(/(\?|&)id=[^&]*/, "") - 특정 패턴을 찾아서 새로운, 지정된 문자열로 교체하는 replace를 함수로 정규식표현을 통해서 특정되어 있는 문자열을 찾아 비어 있는 문자로 대체한다.
        //(currentURL.indexOf("?") >= 0 ? "?" : "?") + "id=" + newId - indexOf 함수로 URL열에서 ?를 0과-1로 있고 없고를 찾아낸다. True이면 &를 false이면 ?를 반환한다. 여기서 우리는 오로지 ?표만 필요하다. 값을 수정해야한다.
        //var newURL = currentURL.replace(/(\?|&)id=[^&]*/, "") + (currentURL.indexOf("?") >= 0 ? "&" : "?") + "id=" + newId;
        var newURL = currentURL.replace(/(\?|&)id=[^&]*/, "") + "?id=" + newId;
        // var newURL = currentURL.replace(/(\?|&)id=[^&]*/, "") + (currentURL.includes("id=") ? "&" : "?") + "id=" + newId;

        window.location.href = newURL;
        // window.location.href = currentURL + "?id=" + newId;
      }
    }
  </script>
</body>

</html>