<head>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<!-- 헤더부분만 수정할려면 스타일 넣기 -->
</head>

<?php
    include "define.php"; 
    
    session_start(); // 세션의 시작. 세션을 저장하거나 저장된 세션을 사용할 때 미리 선언해야 함.

    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    // isset()함수는 id값이 있는지 검사하여 값이 있으면 true, 없다면 false를 반환


    else $userid = "";  //그렇지않다면 $userid를 값을 값이 없는 null로 설정.

    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    
    else $username = ""; 

    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";

?>		
<header>
    <div class="headerwrap">
        <div class="logo">
            <a href="index.php"><img src="./img/ilchon_smile.svg">JWWORLD</a>
        </div>

        <div class="login">

<?php
    if(!$userid) { //로그인 되지 않은 상태.
       
?>           

            <a href="member_form.php">회원가입</a>
            <p>|</p>
            <a href="login_form.php">로그인</a>
            
        


            <?php
                } else { //로그인 상태. 사용자이름,아이디,레벨,포인트가 출력됨.
                

                    $logged = $username."님";
                    /* [Level:".$userlevel.", Point:".$userpoint."] */

            ?>

        
            <a href="javascript:;" style="cursor: default;"><?=$logged?></a>
            <p>|</p>
            <a href="logout.php">로그아웃</a>
            <p>|</p>
            <a href="member_modify_form.php">마이페이지</a>
        


            <?php
                }
            ?>


            <?php
                if($userlevel==1) { //관리자모드버튼. 로그인한 사용자가 관리자인지 확인.
                // 하여 관리자라면 관리자 페이지 접속할 메뉴가 생성됨.
            
            ?>

        
            <p>|</p>
            <a href="admin.php">관리자 모드</a>

            <!-- phpmyadmin에 들어가서 레벨1로 만들면 관리자모드로 변환됨. -->
            <?php
                }
            ?>      
        </div>
    </div>
</header>