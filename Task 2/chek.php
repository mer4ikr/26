<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты</title>
</head>
<body>
    <!-- HTML - отображение постов -->
<?php foreach ($posts as $post): ?>
    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
    <p>Автор: <?php echo htmlspecialchars($post['username']); ?> | Дата: <?php echo $post['created_at']; ?></p>
<?php endforeach; ?>

</body>
</html>
 
<!--Просмотр постов-->
<?php
$stmt = $pdo->query("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
