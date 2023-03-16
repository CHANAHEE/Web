<?php
    header('Content-Type:text/plain; charset=utf-8');

    // delete 할 item 의 no 정보를 받아오자.
    $no = $_GET['no'];
    $db = mysqli_connect('localhost','tjdrjs0803','dkssud109!','tjdrjs0803');
    mysqli_query($db,"set names utf8");
    $sql = "SELECT image FROM market WHERE no=$no";
    $result = mysqli_query($db,$sql);
    if($result){
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $image = $row['image'];
    }

    $sql = "DELETE FROM market WHERE no = $no";
    $result = mysqli_query($db,$sql);

    if($result) {
        echo "아이템이 삭제되었습니다.";

        // 저장되어 있는 파일을 삭제
        
        unlink($image);
    }
    else echo "삭제과정에서 오류발생";

    mysqli_close($db);
?>