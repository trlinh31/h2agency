<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đơn hàng - H2 Agency</title>
  <meta name="description" content="Liên hệ với H2 Agency để nhận tư vấn về dịch vụ marketing tổng thể. Chúng tôi luôn sẵn sàng hỗ trợ bạn." />
  <link rel="stylesheet" href="./assets/styles/styles.css" />
  <link rel="stylesheet" href="contact-styles.css" />
  <link rel="icon" href="favicon.ico" />
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const filePath = "<?= $_SESSION['filePath'] ?? '' ?>";
      if (filePath) {
        const link = document.createElement("a");
        link.href = filePath;
        link.download = filePath.split('/').pop(); // Lấy tên file
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      } else {
        alert("Không tìm thấy file để tải!");
      }
    });
  </script>
</head>

<body>
  <?php require_once('views/layouts/header.php'); ?>

  <section class="contact-hero">
    <div class="container">
      <h1 class="contact-title">TRẠNG THÁI ĐƠN HÀNG</h1>
    </div>
  </section>

  <section class="contact-content">
    <div class="container">
      <h3>Đang tải xuống ebook...</h3>
    </div>
  </section>
</body>

</html>