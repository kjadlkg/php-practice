<?php
include "../db_conn.php";
session_start();
$id = $_SESSION['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$newpw = $_POST['newpw'];
$current_pw = $_POST['currentpw'];

$sql = "SELECT * FROM member WHERE userid = '$id'";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_array($result);

if ($row && password_verify($current_pw, $row['userpw'])) {
    if (empty($newpw)) {
        $sql = "UPDATE member SET username='$name', useremail='$email', userphone='$phone' WHERE userid='$id'";
    } else {
        $hashed_pw = password_hash($newpw, PASSWORD_DEFAULT);
        $sql = "UPDATE member SET userpw='$hashed_pw', username='$name', useremail='$email', userphone='$phone' WHERE userid='$id'";
    }

    if (mysqli_query($db_conn, $sql)) {
        $_SESSION['name'] = $name;
        echo "<script>
        alert('정보가 수정되었습니다.');
        location.href = '../main/index.php';
        </script>";
        exit;
    } else {
        echo "<script>
        alert('정보 수정 중 오류가 발생했습니다.');
        location.href = '../main/index.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
    alert('현재 비밀번호가 일치하지 않습니다.');
    history.back();
    </script>";
    exit;
}

mysqli_close($db_conn);
?>