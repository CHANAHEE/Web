<?php
    // 5. php 문서가 응답하는 데이터의 형식지정, 한글깨짐 방지 설정.
    header('Content-Type:text/html; charset=utf-8');

    // 6. php 에서는 $ 가 변수를 의미하는 표현이다! 
    // 7. 사용자가 GET 방식으로 보낸 값들을 $_GET[] 이라고 하는 슈퍼전역변수에 저장된다.
    // $title= $_GET[0];
    // $message= $_GET[1];
    $title= $_GET['title'];
    $message= $_GET['msg'];

    // 8. 잘 받았는지 확인해보기 위해 응답을 해보자 : echo
    // 9. php 에서 . 은 문자열 결합 연산자 이다.
    echo "제목 : ".$title."<br>";
    echo "메세지 : ".$message;
?>