<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" />
    <title>메인 페이지</title>
</head>

<body>
    <?php
    include "../db_conn.php";

    session_start();
    $name = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
    if (!$name) {
        header("location:../member/login/login.php");
        exit;
    }
    $sql = "SELECT * FROM board order by regdate desc";
    $result = mysqli_query($db_conn, $sql);
    $num = mysqli_num_rows($result);
    ?>

    <p class="center"><a href="index.php"><b style="color:black">게시판</b></a></p>
    <div class="center">
        <b><?php echo $_SESSION['name'] ?>님, 반갑습니다.</b>
        <!-- <button class="btn" onclick="location.href='../mypage/modify.php?user=<?= $_SESSION['id'] ?>'">내 정보</button> -->
        <button class="btn" onclick="location.href='../mypage/modify.php'">내 정보</button>
        <button class="btn" onclick="location.href='../member/login/logout.php'">로그아웃</button>
    </div>
    <hr>
    <br>

    <div>
        <table class="center">
            <thead class="center">
                <tr>
                    <td class="headtd" width="100">작성자</td>
                    <td class="headtd" width="400">제목</td>
                    <td class="headtd" width="50">조회수</td>
                    <td class="headtd" width="200">작성일</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td width="50"><?php echo $rows['writer'] ?></td>
                        <td width="400">
                            <a href="../board/read.php?user=<?php echo $rows['idx'] ?>">
                                <?php echo $rows['title'] ?>
                            </a>
                        </td>
                        <td width="50"><?php echo $rows['views'] ?></td>
                        <td width="200"><?php echo $rows['regdate'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="write">
        <button onclick="location.href='../board/write.php'">글쓰기</button>
    </div>
</body>

</html>