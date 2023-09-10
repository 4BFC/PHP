<?php
file_put_contents('data/' . $_POST['title'], $_POST['description']);
// file_put_contents('data/' . $_GET['title'], $_GET['description']);
//어떤 데이터를 서버쪽으로 전송할 때 title, description과 같은 주소가 포함되는 것은 좋지 않다. URL을 공유할 때 공유 받은 자가 원치 않게 해당 주소의 데이터를 내려받거나 해당 코드들이 실행 될 수 있다. 따라서 우리는 은밀하게 접근해야한다. 그래서 form.html의 form태그에서 method의 POST를 기입해야한다.
//여기서 혼동이 온다. 왜냐하면 웹에서 에러가 나오는데 그건 php파일을 보면 GET으로 값을 전달 받고 있기 때문이다. 이를 post로 변경하면 무리 없이 작동하는 것을 볼 수있다.
// echo "<p>title : " . $_GET['title'] . "</p>";
// echo "<p>description : " . $_GET['description'] . "</p>";
