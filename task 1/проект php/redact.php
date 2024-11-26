<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>форма редактировния</title>
</head>
<body>

<form method="POST" action="edit_account.php">
  <input type="text" name="username" placeholder="Имя" required value="<?php echo htmlspecialchars($currentUser['username']); ?>">
  <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($currentUser['email']); ?>">
  <input type="password" name="password" placeholder="Новый пароль (оставьте пустым для сохранения текущего)">
  <button type="submit">Сохранить изменения</button>

</form>
</body>
</html>


<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    
    // Обновление имени и email
    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->execute([$username, $email, $_SESSION['user_id']]);

    // Обновление пароля, если он указан
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$password, $_SESSION['user_id']]);
    }

    header("Location: profile.php");
}
?>