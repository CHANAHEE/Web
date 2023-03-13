<?php

    header('Content-Type:text/html; charset:utf-8');

    // 2. 사용자가 File 을 보내면 실제 파일데이터들은 임시저장소에 저장되며
    // 이 php 파일 문서에는 File 의 정보만 전달됨. 

    // 3. 그 정보들은 $_FILES[] 라는 배열에 저장됨.
    $file = $_FILES['img'];

    // 4. $file 변수안에는 파일의 타입이나 이름 등의 여러 정보가 들어가있다. 즉, $file 변수도 배열이다!
    // 5. 이 $file 배열변수 안에는 파일 정보가 5개로 지정되어있다.
    $srcName =  $file['name'];   // 5-1. 원본 파일명
    $type =     $file['type'];      // 5-2. 파일 타입
    $size =     $file['size'];      // 5-3. 파일 크기
    $tmpName =  $file['tmp_name'];   // 5-4. 파일 데이터가 저장된 임시저장소의 파일주소(위치)
    $error =    $file['error'];     // 5-5. 에러정보
    // 6. file 배열변수의 인덱스의 값이 지정되어 있는 값!

    // 7. 제대로 왔는지 확인해보자. 응답 확인
    echo "$srcName<br>";
    echo "$type<br>";
    echo "$size<br>";
    echo "$tmpName<br>";
    echo "$error<br>";

    // 8. 정보가 잘 확인되었다면 분명 서버에 이미지 파일이 전송된것. 
    // 근데 이 파일데이터는 임시저장소에 저장되어 있기 때문에 곧 삭제된다.
    // 그래서 온전히 업로드를 하려면 임시저장소에 있는 파일[$tmpName]을 영구히 사라지지 않는
    // 본인 폴더(html 폴더)에 이동시켜야 함. 
    // 이 php 문서가 있는 폴더에 [upload] 라는 폴더를 만들어, 이 폴더 안으로 이동시키자.
    // 단, 이미지 파일의 이름이 중복이 되면 안되므로, 날짜를 기반으로 이름을 정해주자. 
    $dstName = "./upload/".date('YmdHis').$srcName;

    // 9. 임시 저장소 ($tmpName) 에 있는 파일을 원하는 위치($dstName) 으로 이동시키자.
    $result = move_uploaded_file($tmpName,$dstName);
    if($result){
        echo "Success Upload";
    }else {
        echo "Fail Upload";
    }
?>