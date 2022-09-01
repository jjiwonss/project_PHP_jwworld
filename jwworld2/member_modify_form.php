<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>회원정보수정</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body>
	<div id="memberwrap"> 
		<header>
			<?php include "header.php";?>
		</header>
		<?php    
			$con = mysqli_connect("localhost", DBuser, DBpass, DBname); 
		
			$sql    = "select * from members where id='$userid'";
			$result = mysqli_query($con, $sql);
			$row    = mysqli_fetch_array($result);

			
			$pass = $row["pass"];
			$name = $row["name"];

			$email = explode("@", $row["email"]); 
			
			$email1 = $email[0];
			$email2 = $email[1];

			mysqli_close($con);
		?>
		<div id="join_box">

				
			<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
				

				<img src="./img/member_modify.png" alt="회원정보수정">
					<div class="form id">
						<div class="col1" style="width: 110px; margin-top: 4px;">아이디</div>
						<div class="col2" style="width: 400px; margin-right: 0; line-height: 26px; padding-left:5px">
							<?=$userid?> 
						</div>                 
					</div>
					<div class="clear"></div>

					<div class="form">
						<div class="col1">비밀번호</div>
						<div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
							
						</div>                 
					</div>
					<div class="clear"></div>
					<div class="form">
						<div class="col1">비밀번호 확인</div>
						<div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
						</div>                 
					</div>
					<div class="clear"></div>
					<div class="form">
						<div class="col1">이름</div>
						<div class="col2">
							<input type="text" name="name" value="<?=$name?>">
						</div>                 
					</div>
					<div class="clear"></div>
					<div class="form email">
						<div class="col1">이메일</div>
						<div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input 
								type="text" name="email2" value="<?=$email2?>">
						</div>                 
					</div>
					<div class="clear"></div>
					<div class="bottom_line"> </div>
					<div class="button"> 
						<div class="buttons">
							<button onclick="check_input()" type="button" style="cursor:pointer">
								저장하기
							</button>
						</div>
						<div class="buttons">
							<button id="reset_button" onclick="reset_form()" type="button" style="cursor:pointer">
								취소하기
							</button>
						</div>
					</div>
			</form>
		</div> 
	</div>
</body>
</html>
