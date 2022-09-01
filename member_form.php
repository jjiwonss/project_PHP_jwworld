<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>회원가입</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
<script>
   function check_input()
   {
      if (!document.member_form.id.value.trim()) { 
        //회원가입 페이지에 사용자가 아이디를 입력하지 않았다면. trim()은 문자열 좌우에 공백제거하는 함수.

          alert("아이디를 입력하세요!");   
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value.trim()) { 
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value.trim()) { 
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value.trim()) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value.trim()) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value.trim()) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }

    
        //패스워드가 일치하지 않는다면 경고창이 뜸.
      if (document.member_form.pass.value.trim() !=
            document.member_form.pass_confirm.value.trim()) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!"); 
          document.member_form.pass.focus(); 
          document.member_form.pass.select(); 
          return;
      }

      document.member_form.submit(); 
   }

   function reset_form() { //입력 데이터 초기화 함수
      document.member_form.id.value = "";  //공백만들면 안됨.
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
      document.member_form.id.focus();
      return;
   }

   function check_id() { //아이디 중복체크 

   	
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
</script>
</head>
    <body> 
        
        <div id="memberwrap">
            <header>
                <?php include "header.php";?> 
            </header>

            <div id="join_box">
            
                <form  name="member_form" method="post" action="member_insert.php">
                    <img src="./img/joinimg.png">
                    
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <input type="text" name="id">
                        </div>  
                        <div class="col3">
                            <a href="#"><img src="./img/join_idbtn.png" onclick="check_id()"></a>
                        </div>                 
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <input type="password" name="pass"> 
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2">
                            <input type="password" name="pass_confirm">
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name">
            
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form email">
                        <div class="col1">이메일</div>
                        <div class="col2">
                            <input type="text" name="email1"> @ <input type="text" name="email2">
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="bottom_line"> </div>
                    <div class="button"> 
                        <div class="buttons">
                            <button onclick="check_input()">
                                저장하기
                            </button>
                        </div>
                        <div class="buttons">
                            <button id="reset_button" onclick="reset_form()">
                                취소하기
                            </button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </body>
</html>

