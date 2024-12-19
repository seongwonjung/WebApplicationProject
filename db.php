<?php
// 데이터베이스 연결 설정
$host = 'localhost';
$dbname = 'portfolio';
$username = 'root'; // 본인의 DB 사용자명
$password = '';     // 본인의 DB 비밀번호

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "데이터베이스 연결 실패: " . $e->getMessage();
    exit;
}
?>
