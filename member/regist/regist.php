<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <script type="text/javascript" src="../../js/regist.js" defer></script>
    <title>회원가입</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["name"])) {
        echo "<script>
        alert(\"이미 로그인 하셨습니다.\");
        location.href = \"../../main/index.php\";
        </script>";
    } else { ?>
    <div id="regist_wrap" class="wrap">
        <div>
            <h1>Join</h1>
            <form class="form" id="regist_form" action="regist_proc.php" method="post" name="registform"
                onsubmit="return sendit()">
                <p><input type="text" id="username" name="name" placeholder="이름" /></p>
                <p><input type="text" id="userid" name="id" placeholder="아이디" />
                    <input type="hidden" class="caution_message" id="decide_id" name="decide_id" />
                </p>
                <p><span class="caution_message" id="decide">* ID 중복 여부를 확인해주세요.&nbsp;</span>
                    <input type="button" id="check_button" value="ID 중복체크" onclick="checkId()" />
                </p>
                <p><input type="password" id="userpw" name="password" placeholder="비밀번호" /></p>
                <p><input type="password" id="userpw_check" name="password_check" placeholder="비밀번호 확인" /></p>
                <p><input type="text" id="usereamil" name="email" placeholder="이메일" />@
                    <select id="emadress" name="email_adress">
                        <option value="naver.com">naver.com</option>
                        <option value="gmail.com">gmail.com</option>
                        <option value="daum.net">daum.net</option>
                    </select>
                </p>
                <p><input type="text" id="userphone" name="phone" placeholder="전화번호" /></p>
                <p>
                    <span class="caution_message">&nbsp;&nbsp;&nbsp;"-" 없이 숫자만 입력</span>
                    <input type="submit" class="form_btn" id="join_button" value="회원가입" />
                </p>
                <p><a href="../login/login.php" class="login_text">로그인</a></p>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
</body>

</html>