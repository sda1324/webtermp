<?
session_start();

$id=$_SESSION['userid'];
$pw=$_POST['pw'];

$mysqli=mysqli_connect("localhost","root","wjddnwls","members");
 
$check="SELECT * FROM test2 WHERE userid='$id'";

$result=$mysqli->query($check); 

if($result->num_rows==1){
    $row=$result->fetch_array(MYSQLI_ASSOC);
    if($row['userpw']==$pw){
        echo "<script>alert(\"확인되었습니다.\");location.href='info.html';</script>";
    }
    else{
        echo "<script>alert(\"비밀번호가 잘못되었습니다.\");location.href='secu.html';</script>";
    }
}else {
    echo "<script>alert(\"세션 저장 실패\");location.href='secu.html';</script>";
}

mysql_close();
?>