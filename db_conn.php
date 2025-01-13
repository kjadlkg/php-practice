<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

// 연결 생성
$db_conn = new mysqli($host, $username, $password, $database);

// 연결 확인
if ($db_conn->connect_error) {
    die("데이터베이스 연결 실패: " . $db_conn->connect_error);
}
?>