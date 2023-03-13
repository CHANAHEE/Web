<?php
    header('Content-Type:text/html; charset=utf-8');

    // 1. 사용자로부터 전달된 데이터와 파일정보 받기
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $file = $_FILES['img'];

    $srcName = $file['name'];
    $tmpName = $file['tmp_name'];

    $dstName = "./upload/".date('YmdHis').$srcName;
    $result = move_uploaded_file($tmpName,$dstName);

    if($result){
        echo "$name<br>";
        echo "$msg<br>";
        echo "Success Upload<br>";
    }else{
        echo "Fail Upload<br>";
    }

    // ----------------------------

    // 1. 저장되는 날짜와 시간
    $now = date('Y-m-d H:i:s');

    // 2. 전송된 데이터들($title, $message, $dstName) 을 DB 에 저장
    // dotHome 서버에는 이미 DBMS 이 설치되어있음. 

    // 3. MySQL 이라는 DBMS 를 이용하여 데이터들을 저장하자. 이미 테이블은 만들어놨으니, php 를 이용하여 데이터만 저장시키면 된다.
    
    // 3-1. MySQL DB 에 접속하자. 
    // DB 서버주소, DB 접속 ID, DB 접속 비번, DB 이름 을 파라미터로 제공해줘야함.
    // $db : 연결된 DB 를 제어하는 객체 
    $db = mysqli_connect('localhost','tjdrjs0803','dkssud109!','tjdrjs0803'); 
    
    // 3-2. MySQL DB 는 기본적으로 한글이 깨지므로, 쿼리문을 통해 한글도 저장이 가능하도록 해주자.
    mysqli_query($db,"set names utf8");
    
    // 3-3. 원하는 쿼리 작업을 수행하자.
    // DB 에 저장하고자 하는 데이터들($name,$message,$dstName,$now) 를
    // board 라는 이름의 테이블에 insert 하는 명령어
    $sql = "INSERT INTO board(name,msg,file,date) VALUES('$name','$msg','$dstName','$now')";
    // 쿼리문을 만들었을 뿐 아직 요청을 하진 않았다. mysql 에게 요청하자.
    $result = mysqli_query($db,$sql);
    if($result) echo "insert Success";
    else echo "insert Fail";

    // 3-4. DB 작업이 끝났다면, DB 연결을 종료해주어야 한다.
    mysqli_close($db);
?>