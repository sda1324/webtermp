<?php
    session_start();
    
    if(!isset($_SESSOIN['userid'])){
        // echo "<script>alert(\"not login\");location.href='mainpage.html';</script>";
    }
    echo "<script>alert(\"로그인성공\");</script>";
    echo "<a href=../login/logout.php>로그아웃</a>";

?>
