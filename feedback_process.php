<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO feedback (name, message) VALUES (:name, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            header('Location: feedback.php?success=1');
        } else {
            header('Location: feedback.php?error=1');
        }
    } else {
        header('Location: feedback.php?error=1');
    }
    exit;
}
?>
