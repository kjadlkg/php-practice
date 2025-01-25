<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <script type="text/javascript" src="../js/mypage.js" defer></script>
    <title>내 정보</title>
</head>

<body>
    <?php
    include "../db_conn.php";
    session_start();
    $id = $_GET['user'];
    $sql = "SELECT * FROM member WHERE userid = '$id'";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($id != $_SESSION['id']) {
        echo "<script>
        alert('권한이 없습니다.');
        location.href = '../main/index.php';
        </script>";
    } else { ?>
    <div class="wrap" id="myinfo_wrap">
        <div>
            <h1>내 정보</h1>
            <form action="mypage_proc.php" method="post" name="myinfo" onsubmit="return mycheck()">
                <p>
                    <span><b>이름</b></span>
                    <input type="text" class="change_input" id="username" name="name"
                        value="<?php echo $row['username'] ?>" />
                </p>
                <p>
                    <span><b>아이디</b></span>
                    <input type="text" class="change_input" id="userid" name="id" value="<?php echo $row['userid'] ?>"
                        disabled=true />
                </p>
                <p>
                    <span><b>이메일</b></span>
                    <input type="text" class="change_input" id="useremail" name="email"
                        value="<?php echo $row['useremail'] ?>" />
                </p>
                <p>
                    <span><b>전화번호</b></span>
                    <input type="text" class="change_input" id="userphone" name="phone"
                        value="<?php echo $row['userphone'] ?>" />
                </p>
                <p>
                    <span><b>비밀번호</b></span>
                    <input type="password" class="change_input" id="newpw" name="newpw" placeholder="변경할 비밀번호" />
                </p>
                <p>
                    <input type="password" class="change_input" id="currentpw" name="currentpw" placeholder="현재 비밀번호" />
                </p>
                <p>
                    <input type="submit" class="form_btn" value="수정" />
                </p>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
</body>

</html>