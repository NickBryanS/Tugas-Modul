<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Sepatu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!-- Navbar (sama seperti beranda) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">CIBADUYUT SHOES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <a href="index.php" class="btn btn-outline-light btn-sm ms-2">Kembali ke Beranda</a>
        </div>
    </nav>

    <!-- Hero Section dengan form login di tengah -->
    <div class="login-hero d-flex align-items-center justify-content-center">
        <div class="login-card">
            <h4 class="login-title">Login Akun</h4>
            <p class="login-subtitle">Masuk untuk mengelola data sepatu</p>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger py-2">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="controller/proses_login.php">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control"
                        placeholder="Masukkan username"
                        value="<?php echo $_COOKIE['username'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password"
                            class="form-control" placeholder="Masukkan password" required>
                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                            <span id="eye-icon">&#128065;</span>
                        </button>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- Footer (sama seperti beranda) -->
    <footer class="bg-dark text-white text-center p-3">
        &copy; 2026 Sistem Manajemen Sepatu
    </footer>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>