<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');
$conn = connectDb();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Truy vấn sử dụng prepare MySQLi
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email); // gán biến email vào dấu hỏi
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); // lấy dòng kết quả

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ];
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Email hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Myshop</title>
  <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
  <style>.form-sign { max-width: 400px; margin: 100px auto; }</style>
</head>
<body>
<?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>
<main class="form-sign form-signin">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
      <label>Email address</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <label>Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Sign in</button>
    <a href="register.php" class="btn btn-outline-secondary w-100">Register</a>
  </form>
</main>
<?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
<?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
</body>
</html>
