
<meta charset="utf-8">
<?
    include"../web1/dbconn.php";
    
    $page = $_POST['page'];
    $subject = $_POST['bTitle'];
    $num = $_POST['num'];
    $content = $_POST['bContent'];
    $hit = 0;
    $regist_day = 'today';
    $sql = "update notice set title='$subject', content='$content' where num = $num;";

    mysql_query($sql, $link) or die("SQL 에러");
    mysql_close();
    echo "<script> location.href='notice.php?page=$page' </script>;";
?>