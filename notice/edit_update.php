
<meta charset="utf-8">
<?
    include"../web1/dbconn.php";
    
    $page = $_POST['page'];
    $subject = $_POST['bTitle'];
    $num = $_POST['num'];
    $content = $_POST['bContent'];
    $hit = 0;
    $sql = "update notice set title='$subject', content='$content' where num = $num;";

    $link->query($sql) or die("SQL 에러");
    mysqli_close();
    echo "<script> location.href='notice.php?page=$page' </script>;";
?>