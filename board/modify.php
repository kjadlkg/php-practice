<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/board.css" />
    <script src="blank.js"></script>
    <title>게시글 수정</title>
</head>
<body>
    <?php
    session_start();
    $name = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
    include "../db_conn.php";

    $number = $_GET['idx'];
    $sql = "SELECT id, title, content, regdate, writer FROM board WHERE idx = $number";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $content = $row['content'];

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
    } else { ?>
        <div class="wrap">
            <form method="post" action="modify_proc.php" onsubmit="return checkBlank()">
                <table class="outertable" cellpadding=2>
                    <tr>
                        <td><p>게시글 수정</p></td>
                    </tr>
                    <tr>
                        <td>
                            <table class="innertable">
                                <tr>
                                    <td>작성자</td>
                                    <td><input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>"><?php echo $_SESSION['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>제목</td>
                                    <td><input type="text" id="title" name="title" maxlength="30" value="<?php echo $title ?>"></td>
                                </tr>
                                <tr>
                                    <td>내용</td>
                                    <td><textarea name="content" id="content"><?php echo $content ?></textarea></td>
                                </tr>
                            </table>
                            <input type="hidden" name="idx" value="<?php echo $number ?>">
                            <p><input type="submit" class="btn" id="modift_btn" value="수정"></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
<?php
    }
    ?>
</body>
</html>