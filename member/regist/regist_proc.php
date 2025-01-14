<?php
include "../../db_conn.php";

$pw = $_POST['password'];
$hashed_pw = hash('sha256', $pw);

$email = $_POST['email'] . '@' . $_POST['email_adress'];
$sql = "INSERT INTO member (idx, username, userid, userpw, useremail, userphone, regdate) 
        VALUES (NULL, '{$_POST['name']}', '{$_POST['decide_id']}', '$hashed_pw', '$email', '{$_POST['phone']}', NOW())";

$result = mysqli_query($db_conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의하시길 바랍니다.";
} else { ?>
<script>
alert("회원가입이 완료되었습니다.");
location.href = "../../main/index.php";
</script>
<?php
}
?>