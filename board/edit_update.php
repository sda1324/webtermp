
<meta charset="utf-8">
<?
    include"../web1/dbconn.php";
    
    $page = $_POST['page'];
    $subject = $_POST['bTitle'];
    $num = $_POST['num'];
    $content = $_POST['bContent'];
    $hit = 0;
    $regist_day = 'today';
    $sql = "update board set title='$subject', content='$content' where num = $num;";

    $link->query($sql) or die("SQL 에러");
    mysqli_close();
    echo "<script> location.href='board.php?page=$page' </script>;";
?>