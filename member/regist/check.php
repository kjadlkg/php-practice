<?php
include "../../db_conn.php";

$userid = $_GET['userid'];

$sql = "SELECT * FROM member WHERE userid = '$userid'";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    echo "<script>
            window.opener.document.getElementById('decide').innerHTML = '<span style=\"color:red;\">이미 사용중인 아이디입니다. 다른 아이디를 사용해주세요.</span>';
            window.opener.document.getElementById('decide_id').value = '';
            window.opener.document.getElementById('join_button').disabled = true;
            window.close();
          </script>";
} else {
    echo "<script>
            window.opener.decide();
            window.close();
          </script>";
}
?>