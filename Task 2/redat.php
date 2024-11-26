<!--Редактирование постов-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_id'])) {
    if (isset($_SESSION['user_id'])) {
        $postId = $_POST['post_id'];
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        
        $stmt = $pdo->prepare("SELECT user_id FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        $post = $stmt->fetch();

        if ($post && ($post['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] == 'admin')) {
            $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
            $stmt->execute([$title, $content, $postId]);
            header("Location: index.php");
            exit();
        }
    }
}
?>