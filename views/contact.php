<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Liên Hệ - H2 Agency</title>
  <meta name="description" content="Liên hệ với H2 Agency để nhận tư vấn về dịch vụ marketing tổng thể. Chúng tôi luôn sẵn sàng hỗ trợ bạn." />
  <link rel="stylesheet" href="./assets/styles/styles.css" />
  <link rel="stylesheet" href="contact-styles.css" />
  <link rel="icon" href="favicon.ico" />
</head>

<body>
  <?php require_once('views/layouts/header.php'); ?>

  <section class="contact-hero">
    <div class="container">
      <h1 class="contact-title">LIÊN HỆ VỚI H2 MEDIA AGENCY</h1>
    </div>
  </section>

  <section class="contact-content">
    <div class="container">
      <div class="contact-grid">
        <div class="contact-form-section">
          <h2 class="section-title">Thông Tin Liên Hệ</h2>
          <form id="contact-form" method="post" action="./add-contact">
        <div class="form-group">
          <input type="text" name="full_name" placeholder="Họ & tên" required />
        </div>
        <div class="form-group">
          <input type="email" name="email" placeholder="Email" required />
        </div>
        <div class="form-group">
          <input type="text" name="title" placeholder="Tiêu đề" required />
        </div>
        <div class="form-group">
          <textarea name="content" placeholder="Nội dung:" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
      </form>
        </div>

        <div class="contact-info-section">
          <h2 class="section-title">Địa Chỉ</h2>
          <div class="contact-info">
            <div class="contact-item">
              <div class="contact-icon">
                <img src="https://ext.same-assets.com/1223310062/2109097971.png" alt="Location Icon" />
              </div>
              <div class="contact-text">
                <p>Hateco Xuân Phương, Phường Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam</p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <img src="https://ext.same-assets.com/1223310062/4185932444.png" alt="Email Icon" />
              </div>
              <div class="contact-text">
                <p><a href="mailto:h2agency@gmail.com">h2agency@gmail.com</a></p>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">
                <img src="https://ext.same-assets.com/1223310062/4185932444.png" alt="Phone Icon" />
              </div>
              <div class="contact-text">
                <p><a href="tel:0582149999">058.214.9999</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="map-section">
    <div class="container">
      <h2 class="section-title">Bản Đồ</h2>
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.183706880226!2d105.74185807533587!3d21.028856088903835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b93c73ca3d%3A0x210ff89ec146eebd!2sHateco%20Apollo%20Xu%C3%A2n%20Ph%C6%B0%C6%A1ng!5e0!3m2!1svi!2s!4v1719065812182!5m2!1svi!2s"
          width="100%"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-logo">
          <img src="https://ext.same-assets.com/1223310062/461157057.png" alt="h2 agency" />
        </div>
        <div class="footer-info">
          <h3>Công Ty TNHH H2 MEDIA AGENCY</h3>
          <p>
            <strong>H2 AGENCY</strong> là đơn vị chuyên tư vấn & triển khai những dịch vụ liên quan đến lĩnh vực truyền thông số – digital
            marketing, quảng cáo đa lĩnh vực trên các nền tảng mạng xã hội, internet
          </p>
        </div>
      </div>

      <div class="footer-middle">
        <div class="footer-column">
          <h4>Kết nối với chúng tôi:</h4>
          <div class="social-links">
            <a href="https://www.facebook.com/fb.h2agency.vn">Facebook</a>
            <a href="https://zalo.me/0582149999"><img src="https://ext.same-assets.com/1223310062/1248550479.svg" alt="Zalo" /></a>
          </div>
        </div>

        <div class="footer-column">
          <h4>Giới thiệu</h4>
          <h5>Về H2 MEDIA AGENCY</h5>
          <p>
            <strong>H2 AGENCY</strong> là đơn vị chuyên tư vấn & triển khai những dịch vụ liên quan đến lĩnh vực truyền thông số – digital
            marketing, quảng cáo đa lĩnh vực trên các nền tảng mạng xã hội, internet
          </p>
        </div>

        <div class="footer-column">
          <h4>CÁC DỊCH VỤ HỖ TRỢ</h4>
          <p>
            <strong>H2 AGENCY</strong> là đơn vị hỗ trợ đa lĩnh vực trên Internet như:
            <em>Quảng cáo Google Ads, Quảng cáo trên sàn TMĐT, Facebook Ads, Thiết kế & SEO Website</em>
          </p>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="footer-column">
          <h4>Đào tạo</h4>
          <ul>
            <li><a href="#">Khóa Học SEO</a></li>
            <li><a href="#">Khóa Học Google Ads</a></li>
            <li><a href="#">Khóa Học Facebook Ads</a></li>
            <li><a href="#">Khóa Học Xây Dựng Website</a></li>
          </ul>
        </div>

        <div class="footer-column">
          <h4>Kiến thức</h4>
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">SEO Website</a></li>
            <li><a href="#">Sách</a></li>
            <li><a href="#">Digital Marketing</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="contact-buttons">
      <a href="https://maps.app.goo.gl/xVHJDb6zQ8wnvDSP7">
        <img src="https://ext.same-assets.com/1223310062/2109097971.png" alt="Google Map" />
      </a>
      <a href="https://zalo.me/0919181519">
        <img src="https://ext.same-assets.com/1223310062/1980249166.png" alt="Zalo" />
      </a>
      <a href="tel:0919181519">
        <img src="https://ext.same-assets.com/1223310062/4185932444.png" alt="Phone" />
      </a>
    </div>

    <div class="scroll-top">
      <img src="https://ext.same-assets.com/1223310062/1248550479.svg" alt="Scroll to Top" />
    </div>
  </footer>
</body>

</html>