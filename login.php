<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$users = [
    'admin' => 'password123',
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    }
    $error = 'Username atau password salah';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>SIM-Barang</h1>
        <p>Silakan login</p>
    </header>
    <main>
        <section>
            <h2>Login</h2>
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form action="login.php" method="post">
                <p>
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required>
                </p>
                <p>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>
                </p>
                <button type="submit">Masuk</button>
            </form>
        </section>
    </main>
</body>
</html>