<?php
    header('Content-Type:text/plain; charset=utf-8');

    // 파일의 실제 데이터는 임시 저장소로 가고,
    // php 로는 파일 정보만 전달된다.
    $file = $_FILES['img'];
    // $file 은 파일 정보를 가진 배열.
    $srcName = $file['name']; // 원본 파일명
    $size = $file['size']; // 파일 크기
    $tmpName = $file['tmp_name'];// 임시저장소 파일명

    echo "$srcName \n";
    echo "$size \n";
    echo "$tmpName \n";

    // 임시저장소에 있는 이미지를 영구저장소 위치로 이동
    $dstName = "./" . date('YmdHis') .$srcName;
    $result = move_uploaded_file($tmpName,$dstName);

    if($result) echo "upload success";
    else echo "fail";

?>