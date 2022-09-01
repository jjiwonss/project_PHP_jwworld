<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>게시판</title>
	<link rel="stylesheet" type="text/css" href="./css/reset.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/board.css">
	<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>
	<div id="wrap">
		<header>
			<?php include "header.php"; ?>
		</header>
		<div id="mainbox1">
			<div id="dotbox2">
				<div id="box3">
					<div class="menu">
						<div>
							<a href="index.php">홈</a>
						</div>
						<div>
							<a href="#profile">프로필</a>
						</div>
						<div>
							<a href="board_list.php" class="tabon">게시판</a>
						</div>
					</div>

					<div id="boardwrap layout">
						<div class="boxtop4">
							<div class="today">
								<h3>
									TODAY <p style="color:red;">1</p>
								</h3>
								<p> | </p>
								<h3>
									TOTAL <p>1998</p>
								</h3>
							</div>
							<div class="title">
								<h1>정지원님의 미니홈피</h1>
								<a href="#none">http://jiwonss2.dothome.co.kr/jwworld</a>
							</div>
						</div>
						<div id="board_box">

							<div id="boardwrap">
								<div class="view_top">
									<div class="folder">
										<p>지원's 게시판</p>
									</div>
									<div class="folder_text">
										<p>방문해주셔서 감사합니다 '◡' ✿</p>
									</div>
								</div>

								<ul id="board_list">
									<li class="board_title">
										<span class="col1">번호</span>
										<span class="col2">제목</span>
										<span class="col3">작성자</span>
										<span class="col4">첨부</span>
										<span class="col5">작성일</span>
										<span class="col6">조회</span>
									</li>
									<?php

									//page에 값이 설정되어 있는지 확인하는 함수isset()
									if (isset($_GET["page"])) //GET방식으로 페이지 번호 전달받기
										$page = $_GET["page"];
									else
										$page = 1; //설정되어 있지 않으면 초기값 1로 지정

									//DB에서 전체 게시글을 가져오기
									$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
									$sql = "select * from board order by num desc";
									$result = mysqli_query($con, $sql);
									$total_record = mysqli_num_rows($result); //전체 글 수


									//글 목록 하나의 페이지에 표시되는 행의 개수
									$scale = 10;




									//전체 페이지의 수 계산
									if ($total_record % $scale == 0)
										$total_page = floor($total_record / $scale); //전체페이지수
									else
										$total_page = floor($total_record / $scale) + 1;

									//표시할 페이지에 따라 $start계산
									$start = ($page - 1) * $scale;  //시작 레코드 번호

									$number = $total_record - $start; //글의 일련번호



									//DB에서 글 목록을 가져오기 위해 반복 루프설정
									for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
										//글 목록의 항목을 가져오기
										mysqli_data_seek($result, $i);

										$row = mysqli_fetch_array($result); //글 목록의 한 행을 가져와 $row에 저장

										$num         = $row["num"]; //레코드 일련번호
										$id          = $row["id"]; //글쓴이 아이디
										$name        = $row["name"]; //글쓴이 이름
										$subject     = $row["subject"]; //제목
										$regist_day  = $row["regist_day"]; //작성일
										$hit         = $row["hit"]; //조회수


										//첨부 파일 존재 시 아이콘 표시
										if ($row["file_name"])
											$file_image = "<img src='./img/file4.png'>"; //첨부파일 아이콘 바꾸려면 경로찾아서 바꾸기
										else
											$file_image = " "; //공백저장
									?>
										<li class="board_text">
											<span class="col1"><?= $number ?></span> <!-- 게시글번호 -->
											<!-- 글 목록의 각 항목을 화면에 출력 -->
											<span class="col2"><a href="board_view.php?num=<?= $num ?>&page=<?= $page ?>"><?= $subject ?></a></span>

											<span class="col3"><?= $name ?></span> <!-- 글쓴이 -->
											<span class="col4"><?= $file_image ?></span> <!-- 첨부파일 아이콘 -->
											<span class="col5"><?= $regist_day ?></span> <!-- 작성일 -->
											<span class="col6"><?= $hit ?></span> <!-- 조회수 -->
										</li>

										<!-- 페이지 번호 표시 -->
										<!-- 2페이지 이상일 경우 <이전, >다음 표시 -->
									<?php
										$number--;
									}
									mysqli_close($con);
									?>
								</ul>

								<!-- 목록, 글쓰기 버튼 -->
								<ul class="buttons board_list_btn">
									<li><button onclick="location.href='board_list.php'">목록</button></li>
									<li>
										<?php
										if ($userid) {
										?>
											<button onclick="location.href='board_form.php'">글쓰기</button>
										<?php
										} else {
										?>
											<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
										<?php
										}
										?>
									</li>
								</ul>

								<ul id="page_num">


									<?php
									if ($total_page >= 2 && $page >= 2) {
										$new_page = $page - 1;
										echo "<li class=next><a href='board_list.php?page=$new_page' >◀</a> </li>";
									} else
										echo "<li class=space>&nbsp;</li>";

									//게시판 목록 하단에 페이지 링크 번호 출력
									for ($i = 1; $i <= $total_page; $i++) {
										if ($page == $i)   //현재 페이지 번호 링크 안함.
										{
											echo "<li class=num_on><b> $i </b></li>";
										} else {
											echo "<li class=next_num><a href='board_list.php?page=$i'> $i </a><li>";
										}
									}
									if ($total_page >= 2 && $page != $total_page) {
										$new_page = $page + 1;
										echo "<li class=next> <a href='board_list.php?page=$new_page' >▶</a> </li>";/* 이미지 바꿀땐 이미지아이콘경로찾아서 넣기 */
									} else
										echo "<li>&nbsp;</li>";
									?>
								</ul>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>