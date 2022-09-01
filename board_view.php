<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>
<body> 
<div id="wrap">
		<header>
			<?php include "header.php";?>
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
								<?php

									//글 목록 페이지로부터 레코드 일련번호와 페이지번호를 각각 전달받아 변수에 저장
									$num  = $_GET["num"]; /* 글 넘버 */
									$page  = $_GET["page"]; /* 글내용 */


									//DB에서 해당 글 검색하여 글 정보를 가져오기
									//해당레코드 번호 $num을 가진 레코드를 검색하여 다시 $result에 저장
									$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
									$sql = "select * from board where num=$num";
									$result = mysqli_query($con, $sql);

									// $result에서 데이터 가져오기
									$row = mysqli_fetch_array($result);
									$id      = $row["id"]; 
									$name      = $row["name"]; 
									$regist_day = $row["regist_day"]; 
									$subject    = $row["subject"]; 
									$content    = $row["content"]; 
									$file_name    = $row["file_name"]; //첨부파일명
									$file_type    = $row["file_type"]; 
									$file_copied  = $row["file_copied"]; //서버에 저장된 첨부파일명
									$hit          = $row["hit"]; 

									//str_replace()함수는 공백을 HTML의 $nbsp;로 변경해주는 함수.
									$content = str_replace(" ", "&nbsp;", $content);
									$content = str_replace("\n", "<br>", $content);


									//조회수 값 증가와 DB업데이트
									$new_hit = $hit + 1;
									$sql = "update board set hit=$new_hit where num=$num";   
									mysqli_query($con, $sql);



								?>		
								<ul id="view_content">
									<div class="view_top">
										<div class="folder">
											<p>지원's 게시판</p>
										</div>
										<div class="folder_text">
											<p>방문해주셔서 감사합니다 '◡' ✿</p>
										</div>
									</div>
									<li class="view1"> <!-- 제목,글쓴이이름,작성일시 출력 -->
										<span class="col1"><?=$subject?></span>
									</li>
									<li class="view2">
										<p class="col2"><?=$name?></p>
										<p class="col3">
										<?=$regist_day?>
										</p>
										<p class="col4">스크랩 <span>0</span></p>
									</li>
									<li class="view_text">
										<?php
											if($file_name) { /* 첨부파일 정보 출력 */
												$real_name = $file_copied;
												$file_path = "./data/".$real_name;
												$file_size = filesize($file_path);

												

												echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
												<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
											}
										?>
										<?=$content?> 
									</li>		
								</ul>
								<ul class="buttons"> <!-- 버튼삽입 -->
								
								<!-- 화면 하단 목록, 수정, 삭제, 글쓰기 -->
										<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
										<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
										<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
										<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
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