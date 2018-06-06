<?php
	session_start();
	include"../web1/dbconn.php";

	// 한 페이지에 보여줄 리스트 수
	$record_per_page = 15;
	// 한 블럭에 보여줄 페이지 수
	$page_per_block = 5;
	// 현재 페이지
	$now_page = ($_GET['page']) ? $_GET['page'] : 1;
	// 현재 블럭
	$now_block = ceil($now_page / $page_per_block);

	// 공지사항 개수
	$sql = "SELECT * from notice;";
	$result2 = $link->query($sql) or die("SQL 에러1");
	$total_record = mysqli_num_rows($result2);

	$st = $record_per_page * ($now_page - 1);
	$count = $total_record-$record_per_page* ($now_page - 1);

	$sql = "SET @rownum:=$count+1";
	$link->query($sql) or die("SQL 에러4");
	$sql = "SELECT @rownum:=@rownum-1 as row, num from notice ORDER BY num desc LIMIT ".$st.",".$count;
	$result2 = $link->query($sql) or die("SQL 에러5");
	
	$sql = "SELECT num, id, title, regi, hit FROM notice ORDER BY num desc LIMIT ". $record_per_page * ($now_page - 1) .",". $record_per_page;
	$result = $link->query($sql) or die("SQL 에러1");

?>
<!DOCTYPE html>
<div>
	<div>
		<p>
			<div>
				<h1>공지사항</h1>
				<table id="noticetable">
					<tr id="info">
						<th class="num" width=50>번호</th>
						<th class="id">작성자</th>
						<th class="title">제목</th>
						<th class="regi">날짜</th>
						<th class="hit">조회수</th>
					</tr>

					<?php
			for ($i = 0; $i < $record_per_page; $i++) {
			  // 데이터 가져오기
			  mysqli_data_seek($result, $i);  
			  mysqli_data_seek($result2, $i);     
			  $row = mysqli_fetch_array($result);   
			  $row2 =  mysqli_fetch_array($result2);
			?>
			<?if($row){?>
					<tr>
						<td class="num">
							<?= $row2["row"] ?>
						</td>
						<td class="id">
							<?= $row["id"] ?>
						</td>
						<td class="title">
							<a href="read.php?num=<?=$row["num"]?>&page=<?= $now_page?>">
								<?= $row["title"] ?>
							</a>
						</td>
						<td class="regi">
							<?= $row["regi"] ?>
						</td>
						<td class="hit">
							<?= $row["hit"] ?>
						</td>
					</tr>
					<?php }}?>

				</table>
				<? if($_SESSION['userid']=='admin'){?>
					<form action="write.php" method='GET'>
						<div class="write_content" align="right">
							<input type="hidden" name="page" value="<?= $now_page ?>">
							<input type="submit" value="글쓰기" class="btn btn-primary" style="width:80px;height:30px;margin-top:10px;">
						</div>
					</form>
					<?}?>
						<tr>
							<center>
								<?php
                        // 전체 페이지 수
			$total_page = ceil($total_record / $record_per_page);
                        // 전체 블럭 수
			$total_block = ceil($total_page / $page_per_block);

                        // 현재 블럭이 1보다 클 경우
			if(1 < $now_block ) {
				$pre_page = ($now_block - 1) * $page_per_block;
			  echo '<a href="notice.php?page='.$pre_page.'">이전</a>';
			}

			$start_page = ($now_block - 1) * $page_per_block + 1;
			$end_page = $start_page + $page_per_block - 1;

                        // 총 페이지와 마지막 페이지를 같게 하기, 즉 글이 있는 페이지까지만 설정
			if($end_page > $total_page) {
			  $end_page = $total_page;
			}

			?>

								<?php for($i = $start_page; $i <= $end_page; $i++) {?>
								<td>
									<a href="notice.php?page=<?= $i ?>">
										<?= $i ?>
									</a>
								</td>
								<?php }?>

								<?php
                        // 현재 블럭이 총 블럭 수 보다 작을 경우
			if($now_block < $total_block) {
			  $post_page = $now_block * $page_per_block + 1;
			  echo '<a href="notice.php?page='.$post_page.'">다음</a>';
			}

			?>
							</center>
						</tr>
			</div>
		</p>
	</div>
</div>