<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" />
    <script>
    function info() {
        var opt = document.getElementById("search_opt");
        var opt_val = opt.options[opt.selectedIndex].value;
        var info = ""
        if (opt_val == 'title') {
            info = "제목을 입력하세요.";
        } else if (opt_val == 'content') {
            info = "내용을 입력하세요.";
        } else if (opt_val == 'writer') {
            info = "작성자를 입력하세요.";
        }
        document.getElementById("search_box").placeholder = info;
    }
    </script>
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
    $sql = "SELECT * FROM board";
    $result = mysqli_query($db_conn, $sql);
    $num = mysqli_num_rows($result);

    // *** paging ***
    // 한 페이지 당 데이터 개수
    $list_num = 10;
    // 한 블럭 당 페이지 수
    $page_num = 5;
    // 현재 페이지
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;

    $total_page = ceil($num / $list_num);
    $total_block = ceil($total_page / $page_num);
    $now_block = ceil($page / $page_num);

    $start_page = ($now_block - 1) * $page_num + 1;
    if ($start_page <= 0) {
        $start_page = 1;
    }
    $end_page = $now_block * $page_num;
    if ($end_page > $total_page) {
        $end_page = $total_page;
    }
    // 시작번호
    $start = ($page - 1) * $list_num;

    $sql = "SELECT * FROM board ORDER BY regdate DESC limit $start, $list_num;";    // limit a, b : a번부터 b개 출력
    $result = mysqli_query($db_conn, $sql);
    $total = mysqli_num_rows($result);

    ?>


    <p class="center"><a href="index.php"><b id="board">&lt게시판&gt</b></a></p>
    <div class="center">
        <b><?php echo $_SESSION['name'] ?>님, 반갑습니다.</b>
        <button class="btn" onclick="location.href='../mypage/mypage.php?user=<?= $_SESSION['id'] ?>'">내 정보</button>
        <button class="btn" onclick="location.href='../member/login/logout.php'">로그아웃</button>
    </div>
    <hr>
    <br>


    <div class="column">
        <div class="search">
            <form method="get" action="../board/search.php">
                <select class="textform" id="search_opt" name="category" onchange="info()">
                    <option value="title">제목</option>
                    <option value="content">내용</option>
                    <option value="writer">작성자</option>
                </select>
                <input class="textform" id="search_box" type="text" name="search" autocomplete="off"
                    placeholder="제목을 입력하세요." required>
                <input class="submit" type="submit" value="검색">
            </form>
        </div>
    </div>


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
                while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                <tr>
                    <td width="50"><?php echo $rows['writer'] ?></td>
                    <td width="400">
                        <a href="../board/read.php?idx=<?php echo $rows['idx'] ?>">
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


    <div class="paging">
        <p>
            <a href="index.php?page=1">&lt&lt</a>
            <?php
            if ($page <= 1) { ?>
            <a href="index.php?page=1">이전</a>
            <?php } else { ?>
            <a href="index.php?page=<?php echo $page - 1; ?>">이전</a>
            <?php } ?>

            <?php
            for ($print_page = $start_page; $print_page <= $end_page; $print_page++) {
                if ($print_page == $page) { ?>
            <u><a href="index.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a></u>
            <?php } else { ?>
            <a href="index.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
            <?php }
            } ?>

            <?php
            if ($page >= $total_page) { ?>
            <a href="index.php?page=<?php echo $total_page; ?>">다음</a>
            <?php } else { ?>
            <a href="index.php?page<?php echo $page + 1; ?>">다음</a>
            <?php } ?>
            <a href="index.php?page=<?php echo $total_page; ?>">&gt&gt</a>
        </p>
    </div>
</body>

</html>