<?php
    header('Content-Type:text/html; charset=utf-8');

    // 1. MySQL 접속
    $db = mysqli_connect('localhost','tjdrjs0803','dkssud109!','tjdrjs0803');

    // 2. 한글깨짐 방지
    mysqli_query($db,"set names utf8");

    // 3.board 테이블의 데이터를 읽어와야함.(SELECT 쿼리문 작성하자)
    $sql = "SELECT * FROM board";
    $result = mysqli_query($db,$sql); // 4. 쿼리문에 따른 검색결과표를 리턴해줌.
    // 5. $result 는 검색된 결과표를 가진 객체!! 혹은 아무것도 없으면 false.
    if($result){
        // 6. 총 레코드의 수 
        $rowNum = mysqli_num_rows($result);
        for($i=0;$i<$rowNum;$i++){
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC); // 7. 한줄을 배열로 받기 // 9. 여기에 연관배열 설정! NUM 으로 하면 인덱스 배열로 준다~ BOTH 하면 둘다 줌.
            $no = $row['no']; // 8. 배열의 칸번호 대신, 식별자 사용! -> 연관배열이라고 한다. 단, 연관배열로 받기 위해서는 설정해주어야 한다.
            $name = $row['name'];
            $message = $row['msg'];
            $file = $row['file'];
            $date = $row['date'];
            // 10. 데이터 베이스의 이름과 동일해야 함. 

            // 11. 이제 화면에 보여주자. 
            echo "<h2> $no $name</h2>";
            echo "<p> $message </p>";
            echo "<p> $date </p>";

            if($file != null) echo "<img src = '$file' width='50%'>";
        }
    }else{
        echo "Loading Failed";
    }

    // 12. DB 연결 종료
    mysqli_close($db);
?>