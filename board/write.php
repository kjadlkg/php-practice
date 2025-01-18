<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/board.css" />
    <script type="text/javascript" src="../js/blank.js"></script>
    <title>게시글 작성</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["name"])) {
        echo "<script>
        alert(\"로그인이 필요합니다.\");
        location.href = \"../member/login/login.php\";
        </script>";
    } else { ?>
        <div class="wrap">
            <form method="post" action="write_proc.php" onsubmit="return checkBlank()">
                <table id="outertable" cellpadding=2>
                    <tr>
                        <td>
                            <p><b>게시글 작성</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table id="innertable">
                                <tr>
                                    <td>작성자</td>
                                    <td><input type="hidden" name="name"
                                            value="<?= $_SESSION['name'] ?>"><?= $_SESSION['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>제목</td>
                                    <td><input type="text" id="title" name="title" placeholder="제목" maxlength=20 /></td>
                                </tr>
                                <tr>
                                    <td>내용</td>
                                    <td><textarea id="content" name="content"></textarea></td>
                                </tr>
                            </table>
                            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>"><?php echo $_SESSION['id']; ?>
                            <p><input type="submit" id="form_btn" value="등록"></p>
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