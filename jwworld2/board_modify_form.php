<!DOCTYPE html>
<html lang="kr">
<head> 
<meta charset="utf-8">
<title>게시판 수정</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
<!-- 글보기페이지의 하단 수정버튼을 클릭하여 연결된 페이지 글 수정페이지 -->
<script>
	function check_input() {
		if (!document.board_form.subject.value)
		{
			alert("제목을 입력하세요!");
			document.board_form.subject.focus();
			return;
		}
		if (!document.board_form.content.value)
		{
			alert("내용을 입력하세요!");    
			document.board_form.content.focus();
			return;
		}
		document.board_form.submit();
	 }
</script>
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
							<?php
								include "define.php";
									
								session_start();

								//회원 레벨 가져오기: 로그인한 사용자의 회원 레벨을 가져와 $userlevel에 저장
								if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
								else $userlevel = "";

								//관리자가 아닌경우 경고창 띄우기
								//1이 아니면 관리자가 아니므로 '관리자가 아닙니다!'라는 메세지 경고 창 띄움.

								if ( $userlevel != 1 )
								{
									echo("
										<script>
										alert('관리자가 아닙니다! 수정은 관리자만 가능합니다!');
										history.go(-1)
										</script>
									");
									exit;
								}
								//board_view.php로 부터 레코드번호와 페이지번호 전달받기.
								$num  = $_GET["num"];
								$page = $_GET["page"];
								
								//DB에서 글 정보를 가져옴.
								$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
								$sql = "select * from board where num=$num";
								$result = mysqli_query($con, $sql);
								$row = mysqli_fetch_array($result);
								$name       = $row["name"];
								$subject    = $row["subject"];
								$content    = $row["content"];		
								$file_name  = $row["file_name"];
							?>
							<!-- 수정하기 버튼을 클릭하면 DB에 저장된 글을 수정할 수 있도록 action속성을 아래와 같이 지정함. (action="") -->
							<!-- board_modify.php파일에서 글 수정 폼양식의 데이터를 전달받아 DB로 업데이트시킴. -->
							<form  name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
								<ul id="board_form">
									<li> 
										<span class="col1">이름 : </span>
										<span class="col2"><?=$name?></span>
									</li>		
									<li> 
										<span class="col1">제목 : </span>
										<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
									</li>
									<li id="text_area">	
										
										<span class="col1">내용 : </span>
										<span class="col2">
											<textarea name="content"><?=$content?></textarea>
										</span>
									</li>
									<li> 
										<span class="col1"> 첨부 파일 : </span>
										<span class="col2"><?=$file_name?></span>
									</li>
								</ul>
								<ul class="buttons"> 
									
									<li><button type="button" onclick="check_input()">수정하기</button></li>
									<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
								</ul>
							</form>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div> 

</body>
</html>