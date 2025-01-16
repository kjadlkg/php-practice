<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
</head>

<body>
    <?php
    session_start();
    $name = isset($_SESSION["name"]) ? $_SESSION["name"] :"";
    if (!$name) {
        echo "<script>
        location.href=\"../member/login/login.php\";
        </script>";
    } else { ?>
    <p><b><?php echo $name;?></b>님, 반갑습니다.</p>
    <p><button onclick="location.href='logout.php'">로그아웃</button></p>
    <?php
    }
    ?>
</body>

</html>