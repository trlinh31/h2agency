<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập - H2 Agency</title>
  <meta name="description" content="Liên hệ với H2 Agency để nhận tư vấn về dịch vụ marketing tổng thể. Chúng tôi luôn sẵn sàng hỗ trợ bạn." />
  <link rel="stylesheet" href="./assets/styles/styles.css" />
  <link rel="icon" href="favicon.ico" />
</head>

<body>
  <?php require_once('views/layouts/header.php'); ?>

  <?php if (isset($_SESSION['error_message'])): ?>
    <?php echo "<script>alert('" . $_SESSION['error_message'] . "')</script>"; ?>
    <?php unset($_SESSION['error_message']); ?>
  <?php endif; ?>

  <main class="main">
    <div class="container">
      <div class="account-container">
        <div class="login-form">
          <h2>Đăng nhập</h2>
          <form action="./dang-nhap" method="post">
            <div class="form-group">
              <label for="email">Email<span class="required">*</span></label>
              <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu<span class="required">*</span></label>
              <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn-login">ĐĂNG NHẬP</button>
            </div>
          </form>
          <div>
            Bạn chưa có tài khoản? <a href="./dang-ky">Đăng ký ngay</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require_once('views/layouts/footer.php'); ?>
</body>

</html>