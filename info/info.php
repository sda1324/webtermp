<?php
    // $id=$_GET['id'];
    $pw=$_POST['pw'];
    $pwc=$_POST['pwc'];
    $name=$_POST['name'];
    $email=$_POST['email'];

    session_start();
    
    if($pw!=$pwc) //비밀번호와 비밀번호 확인 문자열이 맞지 않을 경우
    {
        echo "<script>alert(\"비밀번호를 확인하세요\");location.href='info.html';</script>";
        exit();
    }
    if($pw==NULL || $name==NULL || $email==NULL)
    {
        echo "<script>alert(\"빈 칸을 모두 채워주세요\");location.href='info.html';</script>";
        exit();
    }
    
    $mysqli=mysqli_connect("localhost","root","wjddnwls","members");
    
    $updateinfo=mysqli_query($mysqli,"UPDATE test2 SET userpw='$pw',name='$name',email='$email' where userid='$_SESSION[userid]'");
    if($updateinfo){
        echo "<script>alert(\"정보수정 완료!!\");location.href='../web1/mainpage.html';</script>";
    }
 
?>
