<?php
    session_start();

$id=$_POST['id'];
$pw=$_POST['pw'];
$mysqli=mysqli_connect("localhost","root","wjddnwls","members");
 
$check="SELECT * FROM test2 WHERE userid='$id'";

$result=$mysqli->query($check); 

if($result->num_rows==1){
    $row=$result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오기
    if($row['userpw']==$pw){  //MYSQLI_ASSOC 필드명으로 첨자 가능
        $_SESSION['userid']=$id;      //로그인 성공 시 세션 변수 만들기
        if(isset($_SESSION['userid']))    //세션 변수가 참일 때
        {
            echo "<script>alert(\"로그인 성공! $id 님 환영합니다.\");location.href='../web1/mainpage.html';</script>";
            //로그인 성공 시 페이지 이동
        }
        else{
            echo "<script>alert(\"세션 저장 실패\");location.href='login.html';</script>";
        }            
    }
    else{
        echo "<script>alert(\"아이디나 비밀번호가 잘못되었습니다.\");location.href='login.html';</script>";
    }
}
else{
    echo "<script>alert(\"아이디나 비밀번호가 잘못되었습니다.\");location.href='login.html';</script>";
}

mysql_close();
?>
