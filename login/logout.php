<?php
session_start();
$res=session_destroy(); //모든 세션 변수 지우기
if($res){
    echo "<script>alert(\"로그아웃 성공\");location.href='../web1/mainpage.html';</script>";
}
?>
