<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
<script>
//사용자가 입력차에 내용을 입력했는지 검사
  function check_input() {
      if (!document.board_form.subject.value.trim())
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value.trim())
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
	
							<div id="boardwrap">

								<form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">


									<ul id="board_form">
										<li>
											<span class="col1">작성자 : </span>
											<span class="col2"><?=$username?></span>
										</li>		
										<li>

											<span class="col1">제목 : </span>
											<span class="col2"><input name="subject" type="text"></span>

										</li>	    	
										<li id="text_area">	
											<span class="col1">내용 : </span>
											<span class="col2">


											<textarea name="content"></textarea>
											</span>
										</li>
										<li class="input_file">


											<span class="col1"> 첨부 파일</span>
											<span class="col2"><input type="file" name="upfile"></span>
										</li>
									</ul>
									<ul class="buttons">
										<li><button type="button" onclick="check_input()">완료</button></li>
										<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
									</ul>
								</form>
	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</body>
</html>