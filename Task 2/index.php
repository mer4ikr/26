<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты</title>
</head>
<body>

<form method="POST" action="create_post.php">
    <input type="text" name="title" placeholder="Заголовок поста" required>
    <textarea name="content" placeholder="Содержание поста" required></textarea>
    <button type="submit">Создать пост</button>
</form>

</body>
</html>
<!--Подключение базы даных-->
<?php
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_username';
$pass = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


