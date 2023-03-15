<?php
    header('Content-Type:application/json; charset=utf-8');

    $name = $_GET['name'];
    $message = $_GET['msg'];
    $age = $_GET['age'];

    // 잘 받았는지 확인하기 위해 안드로이드 쪽으로 응답 echo 를 하자. 
    // 단, 안드로이드 에서 응답결과를 json 형식으로 받아야하므로,
    // 받아온 데이터를 Json 으로 만들어주어야 한다. 
    // php 언어는 연관배열을 json 으로 쉽게 바꿔준다. 
    // echo 할 데이터 값 $name , $message, $age 를 연관배열로 만들어주자. 
    $arr = array();

    $arr['name'] = $name;
    $arr['msg'] = $message;
    $arr['age'] = $age;

    // 연관배열 --> json 문자열로.. 
    echo json_encode($arr);
?>