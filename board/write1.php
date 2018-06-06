<? $page = $_GET['page'];?>
<html>

<head>

	<meta charset="utf-8" />

	<title>자유게시판 글쓰기 | Kurien's Library</title>

	<link rel="stylesheet" href="./css/normalize.css" />

	<link rel="stylesheet" href="./css/board.css" />


</head>

<body>

	<article class="boardArticle">

		<div id="boardWrite">

			<form action="../board/write_update.php" method="post">

				<table id="boardWrite">

					<caption class="readHide" style="font-size: 30px;">자유게시판 글쓰기</caption>

					<tbody>

						<tr>

							<th scope="row"><label for="bTitle">제목</label></th>

							<td class="title"><input type="text" name="bTitle" id="bTitle" style="height:20px; width:300px;"></td>

						</tr>

						<tr>

							<th scope="row"><label for="bContent">내용</label></th>

							<td class="content"><textarea name="bContent" id="bContent" style="margin: 0px; width: 1358px; height:500px;"></textarea></td>

						</tr>

					</tbody>

				</table>
				<div class="btnSet">
					<input type="hidden" name="page" value="<?= $page ?>">

					<button type="submit" name="method" value="글쓰기" class="btnSubmit btn" style="float: right; width:60px; height: 30px;">작성</button>

					<a href="board.php" class="btnList btn" style="margin-left:30px;">목록</a>

				</div>

			</form>

		</div>

	</article>

</body>

</html>