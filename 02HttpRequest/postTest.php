<?php
    header('Content-Type:text/html; charset=utf-8');

    // 1. 사용자가 POST 방법으로 보낸 데이터들은 $_POST[] 이라는 배열에 저장된다.
    $id = $_POST['id'];
    $password = $_POST['pw'];

    // 2. 잘 받았는지 확인해보자. 사용자인 웹 브라우저에게 응답 (Response)하자.
    echo "ID : $id<br>";
    echo "Password : $password";
?>