<!--
hash ( string $algo , string $data, [ bool $raw_output = false ] )
    $algo : 해시 알고리즘
    $data : 해시 알고리즘을 적용할 데이터
    $raw_output : true 일 경우 바이너리 데이터로 결과 변환
    false 일 경우 소문자 hex 값으로 변환
-->

<?php
include "../../db_conn.php";

$pw = $_POST['password'];
$hashed_pw = hash('sha256', $pw);

$sql = "INSERT INTO regist VALUES(null, '{$_POST['name']}', '{$_POST['id']}', '$hashed_pw', now())";
$result = mysqli_query($db_conn, $sql);

if ($result === false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의 바랍니다.". mysqli_error($db_conn);

} else { ?>
<script>
alert("회원가입이 완료되었습니다.");
location.href = "index.php";
</script>
<?php
}
?>