
<meta charset="utf-8">
<?
    session_start();
    include"../web1/dbconn.php";
    if($_POST['method'] == '글쓰기'){
        $page = $_POST['page'];
        $id = $_SESSION['userid'];
        $title = $_POST['bTitle'];
        $content = $_POST['bContent'];
        $hit = 0;
        $regi = date("Y-m-d H:i:s");
        $sql = "insert into notice(id, title, content, regi, hit) values('$id','$title','$content','$regi',$hit);";

        mysql_query($sql, $link) or die("SQL 에러");
        mysql_close();

        echo "<script> location.href='notice.php?page=$page' </script>;";
    }
    else if($_POST['method'] == '댓글등록'){
        $page = $_POST['page'];

        $num = $_POST['num'];
        $id = $_SESSION['userid'];
        $content = $_POST['content'];
        $regi=date("Y-m-d H:i:s");
        $sql = "insert into comment_notice(parent,id,content,regi) values('$num','$id','$content','$regi');";
        
        mysql_query($sql, $link) or die("SQL 에러");
        mysql_close();
        echo "<script> location.href='read.php?num=$num&page=$page' </script>;";
    }
?>