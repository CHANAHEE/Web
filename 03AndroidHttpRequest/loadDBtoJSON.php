<?php
    header('Content-Type:application/json; charset=utf-8');

    $db = mysqli_connect('localhost','tjdrjs0803','dkssud109!','tjdrjs0803');
    mysqli_query($db,"set names utf9");

    $sql="SELECT * FROM board2";
    $result = mysqli_query($db,$sql);

    $rowNum= mysqli_num_rows($result);

    // 50_ 빈 배열을 하나 준비하자.
    $rows = array();
    for($i = 0; $i < $rowNum ; $i++){
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $rows[i] = row;
    }
    // 49_ 연관 배열을 곧바로 JSON 형식으로 변환하는 기능이 있다. 
    echo json_encode($rows);
?>