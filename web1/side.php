<div id="sidebar">
    <div class="sideone" style="padding:25px; " ;>
        <? if(isset($_SESSION['userid'])) { ?>
            <table>
                <tr>
                    <td>
                        <?=$_SESSION['userid']?> 님 환영합니다. </td>
                </tr>
                <tr>
                    <td>
                        <a href="../info/secu.html"> 내 정보 수정하기 </a>
                    </td>
                </tr>
            </table>
            <? } else { ?>
                <form method="post" action="../login/login_check.php">
                    <table style="background:rgba(158, 158, 158, 0.144);">
                        <tr>
                            <td>ID</td>
                            <td>
                                <input type="text" size="20" style="height:30px;" name="id">
                            </td>
                        </tr>
                        <tr>
                            <td>PW</td>
                            <td>
                                <input type="password" size="20" style="height:30px" name="pw">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="로그인" style="width:95px;height:35px">
                                <button type="button" onclick="location.href='../login/signUp.html'" style="width:97px;height:35px"> 회원가입 </button>
                            </td>
                        </tr>
                    </table>
                </form>
                <? } ?>
    </div>
    <div class="sidetwo" style="padding:10px;">

        <embed height="200" width="100%" src="http://www.gagalive.kr/livechat1.swf?chatroom=test"></embed>
    </div>
</div>