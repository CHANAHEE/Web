<?php
    header('Content-Type:application/json; charset=utf-8');
   
    $name= $_POST['name'];
    $message= $_POST['msg'];
    $age= $_POST['age'];

    $arr = array();
    $arr['name'] = $name;
    $arr['msg'] = $message;
    $arr['age'] = $age;
    
    echo json_encode($arr);
?>