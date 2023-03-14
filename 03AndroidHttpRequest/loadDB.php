<?php
    header('Content-Type:text/plain; charset=utf-8');

    // 41_ DB 읽어오기 
    $db = mysqli_connect('localhost','tjdrjs0803','dkssud109!','tjdrjs0803');
    // 42_ 한글 깨짐 방지 쿼리 요청
    mysqli_query($db,"set names utf9");

    $sql="SELECT * FROM board2";
    $result = mysqli_query($db,$sql);

    // 43_ $result 는 쿼리문을 통해 가져온 가상의 테이블임! 
    // 44_ resultSet 의 개수를 받아오자
    $rowNum= mysqli_num_rows($result);

    // 45_ 그 row 의 개수만큼 한줄씩 데이터를 배열로 읽어와서 echo
    for($i = 0;$i<$rowNum;$i++){
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC); // 46_ 연관배열로 한줄을 읽어오는 코드
        $no = $row['no'];
        $name = $row['name'];
        $msg = $row['msg'];
        $date = $row['date'];

        // 46_ 콤마로 값들을 구분하는 구분자를 붙인다. - CSV 방식
        echo $no .",". $name .",". $msg .",". $date."&";
    }

    
    mysqli_close($db);
?>