<?php
session_start();

// 모든 세션 변수 해제
session_unset();

// 세션 ID 삭제
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(  // 세션 ID가 저장된 쿠키 강제 만료
        session_name(), '', time() -42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"] 
    );
}

// 세션 파일 및 브라우저 쿠키 삭제
session_destroy();
?>

<script>
alert("로그아웃 되었습니다.");
location.replace('index.php');
</script>