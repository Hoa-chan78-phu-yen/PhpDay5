<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');
$conn = connectDb();
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra rỗng
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Vui lòng điền đầy đủ thông tin.";
    } elseif ($password !== $confirm_password) {
        $error = "Mật khẩu xác nhận không khớp.";
    } else {
        // Kiểm tra email đã tồn tại
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email đã được sử dụng.";
        } else {
            // Mã hóa mật khẩu và thêm user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user'; // mặc định

            $insert = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $username, $email, $hashedPassword, $role);
            if ($insert->execute()) {
                $success = "Đăng ký thành công. Bạn có thể đăng nhập.";
            } else {
                $error = "Đăng ký thất bại. Vui lòng thử lại.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Myshop</title>
  <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
  <style>.form-register { max-width: 400px; margin: 100px auto; }</style>
</head>
<body>
<?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>
<main class="form-register">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
      <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <div class="form-floating mb-3">
      <input type="text" name="username" class="form-control" placeholder="Your name" required>
      <label>Username</label>
    </div>

    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
      <label>Email address</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <label>Password</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
      <label>Confirm Password</label>
    </div>

    <button class="btn btn-success w-100 py-2 mb-2" type="submit">Register</button>
    <a href="login.php" class="btn btn-outline-secondary w-100">Back to Login</a>
  </form>
</main>
<?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
<?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
</body>
</html>
