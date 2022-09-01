<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset="UTF-8">
    <title>정지원님의 미니홈피</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/main_notice.css">
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
                            <a href="index.php" class="tabon">홈</a>
                        </div>
                        <div>
                            <a href="#profile">프로필</a>
                        </div>
                        <div>
                            <a href="board_list.php">게시판</a>
                        </div>
                    </div>

                    <div class="homewrap layout">
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
                        <div class="boxbottom4">
                            <div class="bbleft4-1">
                                <div class="bl4_top">
                                    <p>TODAY IS..</p>
                                    <p>
                                        새싹
                                    </p>
                                </div>
                                <div class="bl4_center">
                                    <img src="./img/me.png" alt="나" width="226" height="210">
                                    <p>ㅈΓㄹΓㄴr는 새싹 웹퍼블己l셔 <br> 정ズl원입LI⊂ト. (*ˊᵕˋo💐o</p>
                                </div>
                                <div class="bl4_bottom">
                                    <h3>HISTORY</h3>
                                    <div>
                                        <h4>정지원 <span>(♀) 1998. 9. 29 +</span></h4>
                                        <p>jiwonss@kakao.com</p>
                                        <div>
                                            <p>파도타기</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bbright4-2">
                                <div class="br4_top">
                                    <div class="newnotice">
                                        <a href="board_list.php">최근게시물</a>
                                        <ul>
                                        <!-- 최근 게시글 DB에서 불러오기 -->   
                                            <?php
                                                $con = mysqli_connect("localhost", DBuser, DBpass, DBname);
                                                $sql = "select * from board order by num desc limit 5";
                                                $result = mysqli_query($con, $sql); 
                                                //게시판 DB테이블인 BOARD에 저장된 최근 게시물 5개를 num필드에 내림차순으로 정렬 후 $result에 저장

                                                if(!$result)
                                                    echo "게시판 DB 테이블(BOARD)이 생성 전이거나 아직 게시글이 없습니다.";

                                                else
                                                {
                                                    while($row = mysqli_fetch_array($result))
                                                    //board테이블에서 필드의 각 항목 가져오기
                                                    {
                                                            $regist_day =  substr($row["regist_day"],0,10);
                                            ?>
                                                        <li>
                                                            <span><?= $row["subject"] ?></span>
                                                            <span><?= $row["name"] ?></span>
                                                            <span><?= $regist_day?></span>
                                                        </li>
                                            <?php
                                                        }
                                                    }
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="point">
                                        <h4>포인트랭킹</h4>
                                        <ul>
                                                <!-- 포인트 랭킹 표시하기 -->
                                            <?php

                                            $rank = 1; 
                                            $sql = "select * from members order by point desc limit 4";
                                            $result = mysqli_query($con, $sql);

                                            if(!$result)
                                                echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
                                            else
                                            {
                                                while( $row = mysqli_fetch_array($result) )
                                                {
                                                    $name = $row["name"];
                                                    $id = $row["id"];
                                                    $point = $row["point"];

                                                    $name = mb_substr($name,0,1)." * ".mb_substr($name, 2, 1);

                                            ?>
                                                        <li>
                                                            <span><?=$rank?></span>
                                                            <span><?=$name?></span>
                                                            <span><?=$id?></span>
                                                            <span style="font-size: 14px;"><?=$point?></span>
                                                        </li>
                                            <?php
                                                        $rank++;
                                                    }
                                                }
                                                mysqli_close($con);
                                            ?>

                                        </ul>
                                    </div>

                                </div>
                                
                                <div class="brt_bottom">
                                    <div class="miniroom">
                                        <div class="mini_text">
                                            <h4>미니룸</h4>
                                            <h4 style="font-size: 14px; color:#8C8C8C;">포트폴리오</h4>
                                        </div>
                                        <div class="miniroom_box">
                                            <img src="./img/miniroom.png" alt="미니룸" width="614" height="250">
                                            <div class="room_text">
                                                <div>
                                                    <p>미니룸답글달기 [0]</p>
                                                    <p>함께사진찍기</p>
                                                </div>

                                                <div>
                                                    <p>미니룸수 [1]</p>
                                                    <p>깜짝링크 [0]</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ilchon">
                                        <div class="ilchon1">
                                            <p>일촌평</p>
                                            <img src="./img/ilchon.svg" alt="">
                                        </div>
                                        <div class="ilchon2">
                                            <p>나의 소중한 첫번째 일촌이 되어 주세요.</p>
                                            <p>
                                                일촌신청
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>