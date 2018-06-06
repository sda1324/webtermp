            
            <h1> <a href="../web1/mainpage.html"> <img src="../img/logo_white.png" style="position: relative; top: 10px;"></a> </h1>
            <div id="menubar">
                <ul>
                    <li> <a href="#"> 카페소개 </a> </li>
                    <li> <a href="#"> 공지사항 </a> </li>
                    <li> <a> 메 뉴 </a>
                        <ul>
                            <li> <a href="../show/beverage.html"> 음료 </a></li>
                            <li> <a href="../show/dessert.html"> 디저트 </a> </li>
                            <li> <a href="../show/bread.html"> 빵 </a> </li>
                            <li> <a href="../show/goods.html"> 상품 </a> </li>
                        </ul> 
                    </li>
                    <li> <a href="#"> 자유게시판 </a> </li>
                    <li> <a href="../web1/maptest.html"> 매장찾기 </a> </li>
                </ul>
            </div>
            <ul class="top">
            <? if(isset($_SESSION['userid'])) { ?>
                <li> <a> <?=$_SESSION['userid']?> 님 </a> </li>
                <li> <a href="../login/logout.php"> 로그아웃 </a> </li>
                <li> <a href="../info/secu.html"> 정보수정 </a> </li>
            </ul>
            <? } else { ?>
            <ul>
                <li> <a href="../login/login.html"> 로그인</a> </li>
                <li> <a href="../login/signUp.html"> 회원가입 </a> </li>
            </ul>
            <? } ?>