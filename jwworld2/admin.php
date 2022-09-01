<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>
<body> 
	<div id="adminwrap">
		<header>
			<?php include "header.php";?>
		</header>  
	   	<div id="admin_box">
		    <h3 id="member_title">
		    	관리자 모드 > 회원 관리
			</h3>
		    <ul id="member_list">
				<li class="	Mlist_title">
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col4">레벨</span>
					<span class="col5">포인트</span>
					<span class="col6">가입일</span>
					<span class="col7">수정</span>
					<span class="col8">삭제</span>
				</li>
				<?php
					
					//DB에서 전체 회원 가져오기
					//members 테이블의 회원 레코드를 가져와 $result에 저장 후 전체 레코드 수를 계산하여 $total_record에 저장
					$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
					$sql = "select * from members order by num desc";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result); //전체 회원수
				
					$number = $total_record;
				
					/* while 반복 루프에서 DB필드 값 가져오기 */
				while ($row = mysqli_fetch_array($result))
				{
					$num         = $row["num"];        
					$id          = $row["id"];          
					$name        = $row["name"];       
					$level       = $row["level"];       
					$point       = $row["point"];     
					$regist_day  = $row["regist_day"]; 
				?>
				
				<li class="member_form">
					<!-- 하단의 수정버튼을 클릭하면 파일에서 사용자가 수정한 레벨과 포인트를 전달받아 DB를 업데이트 -->
					<form method="post" action="admin_member_update.php?num=<?=$num?>">
						<span class="col1"><?=$number?></span>
						<span class="col2"><?=$id?></a></span>
						<span class="col3"><?=$name?></span>
						<span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
						<span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
						<span class="col6"><?=$regist_day?></span>
			
						<!-- 수정버튼을 admin_member_update.php파일로 이동 -->
						<span class="col7"><button type="submit">수정</button></span>
			
						<!-- 삭제버튼을 클릭하면 admin_member_delete.php파일로 이동 -->
						<span class="col8">
							<button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button>
						</span>
			
					</form>
				</li>	
				
				<?php
					$number--;
				}
				?>
			</ul>
			
		    <h3 id="board_title">
		    	관리자 모드 > 게시판 관리
			</h3>
		    <ul id="board_list">
				<li class="title">
					<span class="col1">선택</span>
					<span class="col2">번호</span>
					<span class="col3">이름</span>
					<span class="col4">제목</span>
					<span class="col5">첨부파일명</span>
					<span class="col6">작성일</span>
				</li>
				
				<!-- 관리자모드 > 게시판관리 부분임. -->
				<!-- action 속성이 admin_board_delete.php로 설정되어 있기 때문에 하단글 삭제 버튼을 클릭하면 체크박스에 선택된 게시글의 레코드가 삭제됨. -->
				<form method="post" action="admin_board_delete.php"> 
					<?php
						
						//게시판의 모든 게시글 가져오기
						$sql = "select * from board order by num desc"; 
						$result = mysqli_query($con, $sql);
						$total_record = mysqli_num_rows($result); //전체 글의 수
					
						$number = $total_record;
					
						
					while ($row = mysqli_fetch_array($result))
					{
						$num         = $row["num"]; 
							$name        = $row["name"]; 
							$subject     = $row["subject"]; 
							$file_name   = $row["file_name"]; 
						$regist_day  = $row["regist_day"]; 
						$regist_day  = substr($regist_day, 0, 10)
					?>
					<li>
						<!-- admin_board_delete.php 파일에서 어떤 체크박스를 선택했는지 검사하여 해당 레코드 삭제 -->
						<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
						<span class="col2"><?=$number?></span>
						<span class="col3"><?=$name?></span>
						<span class="col4"><?=$subject?></span>
						<span class="col5"><?=$file_name?></span>
						<span class="col6"><?=$regist_day?></span>
					</li>	
					<?php
						$number--;
					}
					mysqli_close($con);
					?>
					<!-- 버튼 클릭하면 admin_board_delete.php로 이동 -->
					<div class="board_list_btn">
						<button type="submit">선택된 글 삭제</button>
					</div>
				</form>
			</ul>
			
		</div> 

	</div>
 
</body>
</html>
