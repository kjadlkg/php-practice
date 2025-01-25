<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <title>로그인</title>

    <script type="text/javascript">
    function loginCheck() {
        var userId = document.getElementById("id");
        var userPassword = document.getElementById("pw");
        if (userId.value == "") {
            var err_text = document.querySelector(".err_id");
            err_text.textContent = "아이디를 입력하세요.";
            userId.focus();
            return false;
        };
        if (userPassword.value == "") {
            var err_text = document.querySelector(".err_pw");
            err_text.textContent = "비밀번호를 입력하세요.";
            userPassword.focus();
            return false;
        };
    };
    </script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["name"])) {     // 로그인 상태 확인
        echo "<script>
        alert(\"이미 로그인 하셨습니다.\");
        location.href = \"../../main/index.php\";
        </script>";
    } else { ?>
    <div id="login_wrap" class="wrap">
        <div>
            <h1>Login</h1>
            <form class="form" id="login_form" action="login_proc.php" method="post" name="login_form"
                onsubmit="return loginCheck()">
                <p><input type="text" id="id" name="id" placeholder="아이디" /></p>
                <span class="err_id"></span>
                <p><input type="password" id="pw" name="password" placeholder="비밀번호" /></p>
                <span class="err_pw"></span>
                <p><input class="form_btn" type="submit" value="로그인" /></p>
                <p class="regist_btn"><a href="../regist/regist.php">회원가입</a></p>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
</body>

</html>