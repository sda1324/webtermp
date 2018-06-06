<? 
include"../web1/dbconn.php";
$page = $_GET['page'];
$num = $_GET['num'];
$sql = 'select title, content from board where num = '. $num.';';
$result = $link->query($sql) or die("SQL 에러");
$row = mysqli_fetch_array($result);
mysqli_close();
$subject = $row["title"];
$content = $row["content"];
?>
<html>

<head>

	<meta charset="utf-8" />

	<title>수정하기 | Kurien's Library</title>

	<link rel="stylesheet" href="./css/normalize.css" />

	<link rel="stylesheet" href="./css/board.css" />

	<style>
		.boardArticle h1{
			font-size: 36px;
    		text-decoration: underline;
  			background: #2c62b5;
		}
	</style>
</head>

<body>

	<article class="boardArticle">

		<h1>공지사항</h1>

		<div id="boardWrite">

			<form action="edit_update.php" method="post">

				<table id="boardWrite">

					<caption class="readHide">수정하기</caption>

					<tbody>

						<tr>

							<th scope="row"><label for="bTitle">제목</label></th>

							<td class="title"><input type="text" name="bTitle" id="bTitle" value="<?= $subject ?>"></td>

						</tr>

						<tr>

							<th scope="row"><label for="bContent">내용</label></th>

							<td class="content"><textarea name="bContent" id="bContent"><?= $content ?></textarea></td>

						</tr>

					</tbody>

				</table>
				<div class="btnSet">
					<input type="hidden" name="page" value="<?= $page ?>">
					<input type="hidden" name="num" value="<?= $num ?>">

					<button type="submit" class="btnSubmit btn">수정</button>

					<a href="./board.php" class="btnList btn">목록</a>

				</div>

			</form>

		</div>

	</article>

</body>

</html>