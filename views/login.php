<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Liên Hệ - H2 Agency</title>
  <meta name="description" content="Liên hệ với H2 Agency để nhận tư vấn về dịch vụ marketing tổng thể. Chúng tôi luôn sẵn sàng hỗ trợ bạn." />
  <link rel="stylesheet" href="./assets/styles/styles.css" />
  <link rel="icon" href="favicon.ico" />
</head>

<body>
  <?php require_once('views/layouts/header.php'); ?>

  <main class="main">
    <div class="container">
      <div class="account-container">
        <div class="login-form">
          <h2>Đăng nhập</h2>
          <form>
            <div class="form-group">
              <label for="username">Tên tài khoản hoặc địa chỉ email<span class="required">*</span></label>
              <input type="text" id="username" required>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu<span class="required">*</span></label>
              <input type="password" id="password" required>
              <div class="password-toggle">
                <button type="button" id="togglePassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>
            <div class="form-group remember-me">
              <input type="checkbox" id="remember">
              <label for="remember">Ghi nhớ mật khẩu</label>
            </div>
            <div class="form-group">
              <button type="submit" class="btn-login">ĐĂNG NHẬP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <?php require_once('views/layouts/footer.php'); ?>
</body>

</html>