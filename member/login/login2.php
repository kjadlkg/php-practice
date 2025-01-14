<!-- 식별/인증 분리 -->
<?php
session_start();
include "../../db_conn.php";

$userid = $_POST['id'];
$userpw = $_POST['password'];

$sql = "SELECT * FROM regist WHERE userid='$userid'";
// $result = mysql_query($db_conn, $sql);
// $row = mysql_fetch_array($result);

if (!$row) {    // id 존재 여부 확인 : 식별
    echo "<script>
    alert(\"일치하는 아이디가 없습니다.\");
    history.back();
    </script>";
    exit;
} else {        // id가 일치하면 pw 확인 : 인증
    if($row['userpw'] != $pw) {
        echo "<script>
        alert(\"비밀번호가 일치하지 않습니다.\");
        history.back();
        </script>";
        exit;
    } else {
        $_SESSION['name'] = $row['username'];
        mysqli_close($db_conn);
        header("Location: index.php");
    }
}