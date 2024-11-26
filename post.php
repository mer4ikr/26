<!--Создание постов-->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'])) {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $userId = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $title, $content]);

        header("Location: index.php");
        exit();
    }
}
?>