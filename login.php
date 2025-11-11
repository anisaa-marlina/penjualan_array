<?php
session_start();

// Cek apakah sudah login
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Proses login
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Data login statis
    if ($username === 'admin' && $password === '123') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "❌ Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - POLGAN MART</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #cfdfff, #f3f7ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background: rgba(255,255,255,0.9);
            padding: 35px 45px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            width: 340px;
            text-align: center;
        }
        h2 {
            color: #355c99;
            margin-bottom: 25px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 10px;
            background-color: #eef3ff;
            font-size: 15px;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #7ba7ff;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }
        button:hover {
            background-color: #5e8aff;
        }
        .error {
            color: #e74c3c;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login POLGAN MART</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <?php if ($error): ?>
            <p class="error"><?= $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
