<!-- 식별/인증 동시 ->
<?php
session_start();
include "../../db_conn.php";

$userid = $_POST['id'];
$userpw = $_POST['password'];

$sql = "SELECT * FROM regist WHERE userid='$userid' AND userpw='$userpw'";
// $result = mysql_query($db_conn, $sql);
// $row = mysql_fetch_array($result);

if ($row) {     // 쿼리 결과 존재 시 로그인
  $_SESSION['name'] = $row['username'];
  mysqli_close($db_conn);
  header("Location: index.php");
} else {        // 로그인 실패
  echo "<script>
  alert(\"비밀번호가 일치하지 않습니다.\");
  history.back();
  </script>";
  exit;
 }
 ?>