<? $page = $_GET['page'];?>
<html>

<head>

	<meta charset="utf-8" />

	<title>자유게시판 글쓰기 | Kurien's Library</title>

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

		<h1>공지사항 글쓰기</h1>

		<div id="boardWrite">

			<form action="./write_update.php" method="post">

				<table id="boardWrite">

					<caption class="readHide">공지사항 글쓰기</caption>

					<tbody>

						<tr>

							<th scope="row"><label for="bTitle">제목</label></th>

							<td class="title"><input type="text" name="bTitle" id="bTitle"></td>

						</tr>

						<tr>

							<th scope="row"><label for="bContent">내용</label></th>

							<td class="content"><textarea name="bContent" id="bContent"></textarea></td>

						</tr>

					</tbody>

				</table>
				<div class="btnSet">
					<input type="hidden" name="page" value="<?= $page ?>">

					<button type="submit" name="method" value="글쓰기" class="btnSubmit btn">작성</button>

					<a href=".notice.php" class="btnList btn">목록</a>

				</div>

			</form>

		</div>

	</article>

</body>

</html>