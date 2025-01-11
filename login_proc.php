<?php

$userId = $_POST['id'];
$userPassword = $_POST['password'];

if ($userId == 'admin' && $userPassword == 'admin') {
    echo "<script>alert(\"환영합니다\")</script>";
} else {
    echo "<script>alert(\"다시 시도해주세요\")</script>";
}

?>