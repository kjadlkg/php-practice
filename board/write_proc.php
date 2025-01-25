<?php
include "../db_conn.php";

$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id'];

$sql = "INSERT INTO board (idx, writer, id, title, content, regdate)
VALUES(NULL, '$name', '$id', '$title', '$content', now())";
$result = mysqli_query($db_conn, $sql);

if ($result) {
    echo "<script>
    alert(\"게시글이 등록되었습니다.\");
    location.href = \"../main/index.php\";
    </script>";
} else {
    echo "게시글 등록에 실패하였습니다: " . mysqli_error($db_conn);
}
mysqli_close($db_conn);
?>