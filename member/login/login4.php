<!-- 식별/인증 분리 (Hash) -->
<?php
 session_start();
 include "../../db_conn.php";

 $id = $_POST['id'];
 $pw = $_POST['password'];
 $hashed_pw = hash('sha256', $pw);

 $sql = "SELECT * FROM regist WHERE userid='$id'";
 $result = mysqli_query($db_conn, $sql);
 $row = mysqli_fetch_array($result);

 if (!$row) {
    echo "<script>
    alert(\"일치하는 아이디가 없습니다.\");
    history.back();
    </script>";
    exit;
 } else {
    if ($row["userpw"] != $hashed_pw) {
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
 ?>