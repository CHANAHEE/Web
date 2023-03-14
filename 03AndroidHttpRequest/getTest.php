<?php
    header('Content-Type:text/plain; charset=utf-8');

    // 15_ 안드로이드로부터 GET 방식으로 전달된 데이터를 받아보자.
    $name = $_GET['name'];// 16_ URL 에 명시되어있는 키값
    $message = $_GET['msg'];

    // 17_ 잘 받았는지, 안드로이드 쪽으로 다시 응답해주자.
    echo "$name  : $message";
?>