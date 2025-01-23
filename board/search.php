<?php
include "../db_conn.php";
session_start();

$category = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : "";
$search = mysqli_escape_string($db_conn, $search);

$sql = "SELECT * FROM board WHERE $category LIKE '%$search%' ORDER BY regdate DESC";
$result = mysqli_query($db_conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" />
    <title>검색 결과</title>
</head>

<body>
    <p class="center"><a href="index.php"><b id="board">&lt게시판&gt</b></a></p>
    <div class="center">
        <b>검색 결과</b>
    </div>
    <hr>
    <br>

    <div class="wrap">
        <table class="center">
            <thead class="center">
                <tr>
                    <th width="100">작성자</th>
                    <th width="400">제목</th>
                    <th width="50">조회수</th>
                    <th width="200">작성일</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows(result: $result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td width="50"><?php echo $row['writer']; ?></td>
                            <td width="400">
                                <a href="read.php?idx=<?php echo $row['idx']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </td>
                            <td width="50"><?php echo $row['views']; ?></td>
                            <td width="200"><?php echo $row['regdate']; ?></td>
                        </tr>
                        <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="4">검색 결과가 없습니다.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="write">
        <button onclick="location.href='../main/index.php'">뒤로가기</button>
    </div>
</body>

</html>