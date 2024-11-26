<!-- Удаление постов -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_post_id'])) {
    if (isset($_SESSION['user_id'])) {
        $postId = $_POST['delete_post_id'];
        
        $stmt = $pdo->prepare("SELECT user_id FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        $post = $stmt->fetch();

        if ($post && ($post['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] == 'admin')) {
            $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
            $stmt->execute([$postId]);
            header("Location: index.php");
            exit();
        }
    }
}
?>