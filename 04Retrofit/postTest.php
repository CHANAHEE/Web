<?php
    header('Content-Type:application/json; charset=utf-8');

    // 36_ @Body 로 보낸 json 문자열은 $_POST 라는 배열에 자동 저장되지 않음.
    // $name = $_POST['name'];
    // $message = $_POST['msg'];
    // $age = $_POST['age'];

    // 37_ json 으로 넘어온 데이터는 별도의 임시 공간에 저장된다.[php://input] 에 파일형태로 보관되어있음.
    // 38_ 이 파일을 읽어서 $_POST 배열변수에 대입해주자.
    $data = file_get_contents("php://input");
    // 39_ $data 는 json 으로 된 문자열일것임. json 으로 데이터가 넘어왔기 때문!
    $_POST = json_decode($data,true);// 40_ true의 역할은 연관배열로 할지의 여부
    
    $name= $_POST['name'];
    $message= $_POST['msg'];
    $age= $_POST['age'];

    $arr = array();
    $arr['name'] = $name;
    $arr['msg'] = $message;
    $arr['age'] = $age;
    
    echo json_encode($arr);
?>