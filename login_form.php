<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>로그인</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

<!-- 자신의 프로젝트에 포함시켜야할 파일! -->
<!-- 로그인 페이지의 아이디와 비밀번호 입력창에 데이터가 있는지 검사 후 경고 창 출력 -->
<!-- 데이터가 제대로 입력되었다면 login.php로 이동. -->
<script type="text/javascript" src="./js/login.js"></script>


</head>
	<body> 
		
		<div id="loginwrap">
			<header>
				<?php include "header.php";?>
			</header>
			<div id="login_box">
				<div id="login_title">
					<h1>JWWORLD</h1>
				</div>
				<div id="login_form">
					<form  name="login_form" method="post" action="login.php"> 	       	
						<div class="id_pass">
							<input type="text" name="id" placeholder="아이디">
							<input type="password" id="pass" name="pass" placeholder="비밀번호"> <!-- pass -->
						</div>
						<div class="login_btn">
							<button onclick="check_input()" type="submit" style="cursor: pointer;">
								로그인
							</button>
						<!-- 로그인 페이지 입력창에 아이디와 비번을 입력하여 버튼을 클릭하면 함수 실행. 아이디 입력창에 데이터가 비어있으면 경고창 띄움. -->
						</div>
						<div class="log_bottom">
							<a href="#none">아이디 찾기</a>
							<p>|</p>
							<a href="#none">비밀번호 재설정</a>
							<p>|</p>
							<a href="member_form.php">회원가입</a>
						</div>
					</form>
				</div>
			</div>
		</div> 
	</body>
</html>
