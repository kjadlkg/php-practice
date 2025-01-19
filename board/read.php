<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/board.css">
    <title>게시글 읽기</title>
</head>

<body>
    <?php
    include "../db_conn.php";
    $number = $_GET['idx'];

    $view_sql = "UPDATE board SET views = views+1 WHERE idx = $number";
    mysqli_query($db_conn, $view_sql);

    $sql = "SELECT title, writer, id, content FROM board WHERE idx = $number";
    $result = mysqli_query($db_conn, $sql);
    $row = mysqli_fetch_array( $result );
    ?>
    <div class="wrap">
        <table class="outertable" cellpadding="2">
            <tr>
                <td>
                    <p><b><?php echo $row['title']; ?></b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="innertable">
                        <tr>
                            <td class="writer">작성자</td>
                            <td class="writer2">
                                <input type="hidden" name="name"><?php echo $row['writer'] . " (" . $row['id'] . ")"?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="content"><?php echo nl2br($row['content']) ?></td>
                        </tr>
                    </table>
                    <div id="read_btn">
                        <button class="btn" onclick="location.href='../main/index.php'">목록</button>
                        <button class="btn" onclick="location.href='modify.php?idx=<?php echo $number; ?>'">수정</button>
                        <button class="btn" onclick="location.href='delete.php?idx=<?php echo $number; ?>'">삭제</button>
                    </div>
                </td>
            </tr>
        </table>        
    </div>

</body>

</html>