<?php
session_start();
include "../../db_conn.php";

$userid = $_POST['id'];
$userpw = $_POST['password'];

$sql = "SELECT * FROM member WHERE userid='$userid'";
$result = mysqli_query($db_conn, $sql);
$num = mysqli_num_rows($result);

if (!$num) {    // 아이디 존재여부 확인 : 식별
    echo "<script>
    alert(\"일치하는 아이디가 없습니다.\");
    history.back();
    </script>";
    exit;
} else {        // 비밀번호 확인 : 인증
    $row = mysqli_fetch_array($result);
    if (!password_verify($userpw, $row['userpw'])) {
        echo "<Script>
        alert(\"비밀번호가 일치하지 않습니다.\")
        history.back();
        </script>";
        exit;
    } else {    // 로그인 성공 > 세션 변수 생성
        $_SESSION['name'] = $row['username'];
        $_SESSION['id'] = $row['userid'];
        mysqli_close($db_conn);
        header("Location: ../../main/index.php");
    }
}
?>