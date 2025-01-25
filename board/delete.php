<?php
session_start();
$name = isset($_SESSION["name"]) ? $_SESSION["name"] :"";
include "../db_conn.php";

$number = $_GET['idx'];
$sql = "SELECT id FROM board WHERE idx = $number";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_array($result);

if (!$name) {
    echo "<script>
    alert(\"로그인이 필요합니다.\");
    location.href = \"../member/login.php\";
    </script>";
    exit;
} else if ($_SESSION['id'] != $row['id']) {
    echo "<script>
    alert(\"권한이 없습니다.\");
    history.back();
    </script>";
    exit;
} else {
    $delete_sql = "DELETE FROM board WHERE idx = $number";
    $delete_result = mysqli_query($db_conn, $delete_sql);
    echo "<script>
    alert(\"삭제되었습니다.\");
    location.href = \"../main/index.php\";
    </script>";
    // header("Location: ../main/index.php");
}
mysqli_close($db_conn);
?>