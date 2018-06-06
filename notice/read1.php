<!DOCTYPE>
<?
session_start();
include"../web1/dbconn.php";

if(!isset($_GET["num"])){
	echo "Invalid value input";
	exit();
}

$num = $_GET["num"];
$page = $_GET["page"];

$sql = "select hit from notice where num = '$num'";
$result = $link->query($sql) or die("SQL 에러1");
$row = mysqli_fetch_array($result);   
$hit = $row['hit'] +1;
$sql = "update notice set hit=$hit where num = '$num'";
$result = $link->query($sql) or die("SQL 에러2");

$sql = "SELECT title, id, content, regi, hit FROM notice WHERE num ='$num'";

// 데이터 가져오기
$result = $link->query($sql) or die("SQL 에러3");
$row = mysqli_fetch_array($result);

	// 한 페이지에 보여줄 리스트 수
	$record_per_page = 5;
	// 한 블럭에 보여줄 페이지 수
	$page_per_block = 5;
	// 현재 페이지
	$now_page = ($_GET['com_page']) ? $_GET['com_page'] : 1;
	// 현재 블럭
	$now_block = ceil($now_page / $page_per_block);

	// 공지사항 개수
	$sql = "SELECT id, content, regi FROM comment_notice WHERE parent='$num' ORDER BY num desc;";
	$result = $link->query($sql) or die("SQL 에러4");
	$total_record = mysqli_num_rows($result);
	$sql = "SELECT num, id, content, regi FROM comment_notice WHERE parent='$num' ORDER BY num desc LIMIT ". $record_per_page * ($now_page - 1) .",". $record_per_page;
	$result = $link->query($sql) or die("SQL 에러5");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
  	.write_content{
  		margin: 5px 15px;
	  }
        .board img {
	border: 0;
}
.board,
.board textarea,
.board select {
	font-size: 12px;
	font-family: 돋움, Dotum, Tahoma, Geneva, sans-serif;
}
.board textarea {
	width:-webkit-fill-available;
	margin: 0;
	padding: 3px 4px;
	border: 1px solid #a6a6a6;
	border-right-color: #d8d8d8;
	border-bottom-color: #d8d8d8;
}
.board label {
	display: inline-block;
	margin: 0;
}
/* Board Header */
.board_header {
	position: relative;
	zoom: 1;
	margin: 0 0 22px 0;
}
.read_header {
	position: relative;
	/*background: url(bgHeader.gif) no-repeat right -50px;*/
}
.read_header h1 {
	width: auto;
	background-color: #1d64a2;
	margin: 0 0 0 15px;
	font-size: 12px;
	line-height: 36px;
	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	color: #fff;
}
.read_header .time {
	margin: 0;
	position: absolute;
	top: 13px;
	right: 12px;
	color: #bfbfbf;
	font-size: 15px;
}
.read_header .meta {
	margin: 0;
	padding: 8px 12px 8px 15px;
	background: #f6f6f6;
	border-bottom: 1px solid #ddd;
	zoom: 1;
	white-space: nowrap;
}
.read_header .meta:after {
	content: "";
	display: block;
	clear: both;
}
.read_header .meta .author {
	float: left;
	text-decoration: none;
	color: #666;
	font-weight: bold;
}
.read_header .meta .sum {
	float: right;
	color: #666;
	font-size: 11px;
}
.read_body {
	padding: 15px;
	background: #fff;
}

    </style>
</head>
<body>
    <div class="board">
		<h1>공지사항</h1>		
		<div class="board_read">
			<!-- READ HEADER -->
			<div class="read_header">
				<h1 style="margin:0px;padding:10px 0px 10px 10px;font-size:18px;border:none;display:block;">
					<span><?= $row["title"] ?></span>
				</h1>
				<p class="time">
    				<?= $row["regi"] ?>
				</p>
				<p class="meta">
					<a href="#popup_menu_area" class="member_78949 author" onclick="return false"><?=$row['id']?></a>
					<span class="sum">
						<span class="read">조회 수:<?= $row["hit"] ?></span>
					</span>
				</p>
			</div>
			<div class="read_body">
				<div class="document_83629_78949 xe_content">
					<?= $row["content"] ?>
				</div>		
			</div>
		</div>
    	<div>
			<? if($_SESSION['userid'] == $row['id']){?>
			<form action="edit.php" methoid="GET">
				<input type="hidden" name="page" value="<?= $page ?>">
				<input type="hidden" name="num" value="<?= $num ?>">
				<input type="submit" value="수정">
    		</form>
			<form action="remove_notice.php" methoid="GET">
				<input type="hidden" name="page" value="<?= $page ?>">
				<input type="hidden" name="num" value="<?= $num ?>">
				<input type="submit" name="method" value="삭제">
			</form>
			<?}?>
			<form action="notice.php" metehod="GET">
				<input type="hidden" name="page" value="<?= $page ?>">
				<input type="submit" value="목록가기">
			</form>
		</div>
		<? if($_SESSION['userid']){ ?>
		<div>
			<form action="write_update.php" method="POST">
				<input type="hidden" name="page" value="<?= $page ?>">
				<input type="hidden" name="num" value="<?= $num ?>">
				<textarea name="content" placeholder='댓글을 등록하세요'></textarea>
				<input type="submit" name="method" value="댓글등록">
			</form>
		</div>		
		<?}?>
	</div>
	<div>
		<table class="table table-striped">
			<tr id="info">
				<td class="id" width=50>작성자</td>
				<td class="content">내용</td>
        		<td class="regi">날짜</td>
				<td class="del"></td>
			</tr>

			<?php
			for ($i = 0; $i < $record_per_page; $i++) {
			  // 데이터 가져오기
			  mysqli_data_seek($result, $i);       
			  $row = mysqli_fetch_array($result);   
			?>
			<tr>
				<td class="id"><?= $row["id"] ?></td>
				<td class="content"><?= $row["content"] ?></td>
        		<td class="regi"><?= $row["regi"] ?></td>
				<td>
					<?if($_SESSION['userid'] == $row['id'] && $row){?>
					<form action="remove_notice.php" method="GET">
					<input type="hidden" name="page" value="<?= $page ?>">
					<input type="hidden" name="com_page" value="<?= $now_page ?>">
					<input type="hidden" name="com_num" value="<?= $row["num"] ?>">
					<input type="hidden" name="num" value="<?= $num ?>">
					<input type="submit" name="method" value="댓글삭제">
					</form>
					<?}?>
				</td>
			</tr>
			<?php }?>

		</table>
		<center>
			<?php
                        // 전체 페이지 수
			$total_page = ceil($total_record / $record_per_page);
                        // 전체 블럭 수
			$total_block = ceil($total_page / $page_per_block);

                        // 현재 블럭이 1보다 클 경우
			if(1 < $now_block ) {
			  $pre_page = ($now_block - 1) * $page_per_block;
			  echo '<a href="read.php?num='.$num.'&page='.$page.'&com_page='.$pre_page.'">이전</a>';
			}

			$start_page = ($now_block - 1) * $page_per_block + 1;
			$end_page = $start_page + $page_per_block - 1;

                        // 총 페이지와 마지막 페이지를 같게 하기, 즉 글이 있는 페이지까지만 설정
			if($end_page > $total_page) {
			  $end_page = $total_page;
			}
			?>
      
			<?php for($i = $start_page; $i <= $end_page; $i++) {?>
			    <td><a href="read.php?num=<?= $num ?>&page=<?= $page ?>&com_page=<?= $i ?>"><?= $i ?></a></td>
      <?php }?>
      
			<?php
                        // 현재 블럭이 총 블럭 수 보다 작을 경우
			if($now_block < $total_block) {
			  $post_page = $now_block * $page_per_block + 1;
			  echo '<a href="read.php?num='.$num.'&page='.$page.'&com_page='.$post_page.'">다음</a>';
			}

			?>
      </center>
		</div>

</body>
</html>