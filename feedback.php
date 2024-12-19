<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM feedback ORDER BY created_at DESC");
$stmt->execute();
$feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>방명록</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>My Portfolio</h1>
            <nav>
                <ul>
                    <li><a href="about.html">자기소개</a></li>
                    <li><a href="projects.html">프로젝트</a></li>
                    <li><a href="contact.html">연락처</a></li>
                    <li><a href="feedback.php">방명록</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="feedback-form">
            <h2>방명록 작성</h2>
            <?php if (isset($_GET['success'])): ?>
                <p class="success">메시지가 성공적으로 저장되었습니다!</p>
            <?php elseif (isset($_GET['error'])): ?>
                <p class="error">모든 필드를 올바르게 입력해주세요.</p>
            <?php endif; ?>
            <form action="feedback_process.php" method="POST">
                <input type="text" name="name" placeholder="이름" required>
                <textarea name="message" placeholder="메시지" required></textarea>
                <button type="submit">보내기</button>
            </form>
        </section>

        <section class="feedback-list">
            <h2>방명록</h2>
            <?php foreach ($feedbacks as $feedback): ?>
                <div class="feedback-item">
                    <h3><?php echo htmlspecialchars($feedback['name']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($feedback['message'])); ?></p>
                    <small><?php echo $feedback['created_at']; ?></small>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 My Portfolio. All rights reserved.</p>
    </footer>
</body>
</html>
