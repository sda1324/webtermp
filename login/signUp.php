<?php
    $id=$_POST['id'];
    $pw=$_POST['pw'];
    $pwc=$_POST['pwc'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    
    if($pw!=$pwc) //비밀번호와 비밀번호 확인 문자열이 맞지 않을 경우
    {
        echo "<script>alert(\"비밀번호를 확인하세요\");location.href='signUp.html';</script>";

        // echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
        // echo "<a href=signUp.html>back page</a>";
        exit();
    }
    if($id==NULL || $pw==NULL || $name==NULL || $email==NULL) //
    {
        echo "<script>alert(\"빈 칸을 모두 채워주세요\");location.href='signUp.html';</script>";
        // echo "빈 칸을 모두 채워주세요";
        // echo "<a href=signUp.html>back page</a>";
        exit();
    }
    
    $mysqli=mysqli_connect("1.214.233.123","root","wjddnwls","members");
    
    $check="SELECT *from test2 WHERE userid='$id'";
    $result=$mysqli->query($check);
    if($result->num_rows==1)
    {
        echo "<script>alert(\"중복된 아이디입니다.\");location.href='signUp.html';</script>";
        // echo "중복된 id입니다.";
        // echo "<a href=signUp.html>back page</a>";
        exit();
    }
    
    $signup=mysqli_query($mysqli,"INSERT INTO test2 (userid,userpw,name,email) 
    VALUES ('$id','$pw','$name','$email')");
    if($signup){
        echo "<script>alert(\"회원가입 완료!! 로그인하세요\");location.href='login.html';</script>";

        // echo "sign up success";
    }

    mysql_close();
 
?>
