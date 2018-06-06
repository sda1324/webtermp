<?
    include"../web1/dbconn.php";
    
    $num = $_GET['num'];
    $page = $_GET['page'];
    $sql = "delete from notice where num = " . $num;

    mysql_query($sql, $link) or die("SQL 에러");
    mysql_close();
    echo "<script> location.href='notice.php?page=$page' </script>;";
?>