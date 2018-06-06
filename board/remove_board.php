<?
    include"../web1/dbconn.php";
    if($_GET['method']=='삭제'){
    $num = $_GET['num'];
    $page = $_GET['page'];
    $sql = "delete from board where num = " . $num;

    $link->query($sql) or die("SQL 에러");
    mysqli_close();
    echo "<script> location.href='board.php?page=$page' </script>;";
    }
    else if($_GET['method']=='댓글삭제'){
        $num = $_GET['num'];
        echo $num;
        $page= $_GET['page'];
        $com_page= $_GET['com_page'];
        $com_num = $_GET['com_num'];
        $sql = "delete from comment_board where num = $com_num;";
        $link->query($sql) or die("SQL 에러");
        mysqli_close();
        echo "<script> location.href='read.php?num=$num&page=$page&com_page=$com_page' </script>;";
    }
?>