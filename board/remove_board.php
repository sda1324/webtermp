<?
    include"../web1/dbconn.php";
    
    $num = $_GET['num'];
    $page = $_GET['page'];
    $sql = "delete from board where num = " . $num;

    $link->query($sql) or die("SQL 에러");
    mysqli_close();
    echo "<script> location.href='board.php?page=$page' </script>;";
?>