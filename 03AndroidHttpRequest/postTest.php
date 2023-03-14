<?php
    header('Content-Type:text/plain; charset=utf-8');

    // 24_ Android 로부터 POST 방식으로 전달된 데이터받기
    $name = $_POST['name'];
    $message = $_POST['msg'];

    // 25_ 잘 받았는지 Android 로 다시 echo(응답 : Response)
    echo "$name : $message";


    // 26_ 게시글이 저장될 시간 변수를 만들자. name 이랑 msg 는 있으니까..
    $now = date("Y-m-d H:i:s");
    
    // 27_ MySQL DB 의 board2 테이블에 데이터를 저장하자. 
    // 27_1. DB 서버에 접속하기
    $db = mysqli_connect('localhost','tjdrjs0803','dkssud109!','tjdrjs0803');

    // 27_2. 한글 깨짐 방지
    mysqli_query($db,"set names utf8");

    // 27_3. 원하는 CRUD 작업의 쿼리문
    // $name, $message, $now 값을 삽입하는 쿼리문
    $sql = "INSERT INTO board2(name, msg, date) VALUES('$name','$message','$now')";
    $result = mysqli_query($db,$sql);

    if($result) echo "Insert Success";
    else echo "Insert Failed";

    // 27_4. DB 연결 종료
    mysqli_close($db);
?>