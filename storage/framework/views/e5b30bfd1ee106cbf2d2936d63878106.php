<?php
session_start();
require_once __DIR__ . '/db.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'login';
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirm_password'] ?? '');

    if ($action === 'register') {
        if ($username === '' || $password === '' || $confirmPassword === '') {
            $error = 'Semua field wajib diisi.';
        } elseif (strlen($password) < 6) {
            $error = 'Password minimal 6 karakter.';
        } elseif ($password !== $confirmPassword) {
            $error = 'Password dan konfirmasi password tidak cocok.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO users (username, password, role, created_at) VALUES (?, ?, ?, ?)');
            try {
                $stmt->execute([$username, $passwordHash, 'visitor', date('Y-m-d H:i:s')]);
                // Auto login after register
                $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];
                header('Location: index.php');
                exit();
            } catch (PDOException $e) {
                $error = 'Username sudah ada.';
            }
        }
    } elseif ($action === 'login') {
        if ($username === '' || $password === '') {
            $error = 'Username dan password wajib diisi.';
        } else {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];
                header('Location: index.php');
                exit();
            }

            $error = 'Username atau password salah.';
        }
    }
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Login - My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">My Profile</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <section class="section contact-section">
      <div class="container">
        <h1>Login / Register</h1>
        <p class="corporate-text">Login untuk akses web profile. Register sebagai visitor untuk membuat akun baru.</p>
        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo e($error); ?></div>
        <?php endif; ?>

        <ul class="nav nav-tabs" id="authTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register Visitor</button>
          </li>
        </ul>
        <div class="tab-content" id="authTabContent">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form action="login.php" method="POST" class="mt-3">
              <input type="hidden" name="action" value="login" />
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required />
              </div>
              <button type="submit" class="btn btn-primary">Masuk</button>
            </form>
          </div>
          <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <form action="login.php" method="POST" class="mt-3">
              <input type="hidden" name="action" value="register" />
              <div class="mb-3">
                <label for="reg_username" class="form-label">Username</label>
                <input type="text" id="reg_username" name="username" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="reg_password" class="form-label">Password</label>
                <input type="password" id="reg_password" name="password" class="form-control" required minlength="6" />
              </div>
              <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required />
              </div>
              <button type="submit" class="btn btn-primary">Daftar sebagai Visitor</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function switchToRegister() {
        const registerTab = new bootstrap.Tab(document.getElementById('register-tab'));
        registerTab.show();
      }
    </script>
  </body>
</html>
<?php /**PATH D:\laragon\www\lat_laravel\resources\views/login.blade.php ENDPATH**/ ?>