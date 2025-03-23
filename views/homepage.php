<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>H2 Agency - Giải Pháp Toàn Diện Hiệu Quả Cho Marketing</title>
  <meta
    name="description"
    content="H2 AGENCY cung cấp dịch vụ tư vấn marketing tổng thể. Với kinh nghiệm triển khai cho nhiều doanh nghiệp lớn, chúng tôi chinh phục khách hàng bằng chiến dịch sáng tạo." />
  <link rel="stylesheet" href="./assets/styles/styles.css" />
  <link rel="icon" href="favicon.ico" />
</head>

<body>
  <?php require_once('views/layouts/header.php'); ?>
  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <h1 class="main-title">H2 MEDIA - GIẢI PHÁP TOÀN DIỆN HIỆU QUẢ CHO MARKETING</h1>
        <p class="hero-text">
          <strong>H2 AGENCY</strong> cung cấp dịch vụ tư vấn marketing tổng thể. Với kinh nghiệm triển khai cho nhiều doanh nghiệp lớn, chúng tôi
          chinh phục khách hàng bằng chiến dịch sáng tạo, chiến lược từ phương vụ và công nghệ vượt trội.
        </p>
        <a href="tel:0919181519" class="btn btn-primary">Liên hệ ngay</a>
      </div>
      <div class="hero-image">
        <img src="https://ext.same-assets.com/1223310062/2386948866.png" alt="Marketing Solutions" />
      </div>
    </div>
  </section>

  <section class="services">
    <div class="container">
      <h2 class="section-title">SẢN PHẨM NỔI BẬT CỦA H2 AGENCY</h2>
      <div class="service-cards">
        <?php foreach ($products as $product): ?>
          <div class="service-card">
            <img src="<?= $product['thumbnail'] ?>" alt="" />
            <h3><?= $product['title'] ?></h3>
            <p><?= $product['description'] ?></p>
            <a href="?page=san-pham&id=<?= $product['id'] ?>" class="btn btn-secondary">TÌM HIỂU THÊM</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="about">
    <div class="container">
      <div class="about-content">
        <h2 class="section-title">GIỚI THIỆU ĐỘI NGŨ</h2>
        <p>
          Được thành lập vào năm 2020 với sứ mệnh đem lại giá trị tốt nhất cho khách hàng và doanh nghiệp. H2 MEDIA cam kết đem lại cho khách hàng
          sử dụng dịch vụ những trải nghiệm về dịch vụ hàng đầu khi lựa chọn chúng tôi.
        </p>
        <ul>
          <li>Dịch vụ chạy quảng cáo Facebook Ads, Google Ads chuyên nghiệp.</li>
          <li>Đội ngũ nhân viên tư vấn nhiệt tình, tận tâm.</li>
          <li>Triển khai nhanh chóng, hiệu quả, gia tăng doanh số.</li>
        </ul>
        <a href="#" class="btn btn-primary">Xem thêm</a>
      </div>
      <div class="about-image">
        <img src="https://ext.same-assets.com/1223310062/3704582874.png" alt="Đội ngũ H2 Agency" />
      </div>
    </div>
  </section>

  <section class="why-choose-us">
    <div class="container">
      <h2 class="section-title">Lý do bạn nên lựa chọn chúng tôi!</h2>
      <p>
        <strong>H2 AGENCY</strong> là một Agency Marketing chuyên nghiệp với kinh nghiệm lâu năm trong việc cung cấp các giải pháp quảng cáo và
        truyền thông hiệu quả cho các doanh nghiệp. Dưới đây là những lý do nên lựa chọn H2 AGENCY như một đối tác đáng tin cậy trong lĩnh vực này.
      </p>
      <ul class="benefits-list">
        <li>
          <img src="https://ext.same-assets.com/1321559704/3456698760.svg" alt="Check" /> Chúng tôi làm việc chuyên nghiệp, đặt mục tiêu hỗ trợ
          khách hàng một cách hiệu quả.
        </li>
        <li>
          <img src="https://ext.same-assets.com/1321559704/3456698760.svg" alt="Check" /> Hỗ trợ khách hàng thành công trong những dự án vừa và nhỏ.
        </li>
        <li>
          <img src="https://ext.same-assets.com/1321559704/3456698760.svg" alt="Check" /> Chi phí hợp lý: Mọi chi phí đều nằm trong duy nhất các gói
          mà chúng tôi đã nêu, đảm bảo không phát sinh phí ngoài.
        </li>
      </ul>
      <div class="action-buttons">
        <a href="tel:0919181519" class="btn btn-primary">Liên hệ ngay</a>
        <img src="https://ext.same-assets.com/1223310062/2602287957.png" alt="UFO Image" class="ufo-image" />
      </div>
    </div>
  </section>

  <section class="pricing">
    <div class="container">
      <h2 class="section-title">BẢNG GIÁ DỊCH VỤ</h2>
      <div class="pricing-cards">
        <div class="pricing-card basic">
          <h3>Basic</h3>
          <p>Dành cho doanh nghiệp mới bắt đầu với ngân sách vừa phải, duy trì và triển khai trong 1 - 3 tháng</p>
          <div class="price">5.000.000 - 50.000.000 VNĐ</div>
          <ul>
            <li>Thời gian thực hiện: 1 - 3 tháng</li>
            <li>Tặng tên miền trị giá 300,000</li>
            <li>Tặng hosting SSD cao cấp băng thông không giới hạn</li>
            <li>Tặng 10 email tên miền dung lượng 5Gb</li>
            <li>Tặng phần mềm Yoast SEO Premium bản quyền</li>
            <li>Tặng phần mềm tăng tốc website WP Rocket bản quyền</li>
            <li>Tặng phần mềm bản quyền chống virus xâm nhập</li>
            <li>Tặng SSL – Chứng chỉ bảo mật</li>
            <li>Thiết kế chuẩn SEO</li>
            <li>Tích hợp Hotline, Zalo, Facebook, Youtube, Livechat</li>
            <li>Backup, sao lưu dữ liệu hàng tuần</li>
          </ul>
          <a href="tel:0582149999" class="btn btn-outline">Nhận Tư Vấn</a>
        </div>

        <div class="pricing-card gold">
          <h3>Gold</h3>
          <p>Dành cho những doanh nghiệp vừa và nhỏ cần đẩy mạnh hoạt động SEO, với chi phí vừa phải, tiết kiệm</p>
          <div class="price">50.000.000 - 300.000.000 VNĐ</div>
          <ul>
            <li>Thời gian thực hiện: 3 - 6 tháng</li>
            <li>Tặng tên miền trị giá 500,000</li>
            <li>Tặng hosting SSD cao cấp băng thông không giới hạn</li>
            <li>Tặng 50 - 200 email tên miền dung lượng 5Gb</li>
            <li>Tặng phần mềm Yoast SEO Premium bản quyền</li>
            <li>Tặng 02 banner thiết kế đẹp</li>
            <li>Thiết kế chuẩn SEO</li>
            <li>Tối ưu UX/UI hoàn thiện giao diện website</li>
            <li>Duy trì, xây dựng nội dung & SEO tổng thể</li>
            <li>Backup, sao lưu dữ liệu hàng tuần</li>
            <li>Tích hợp tiện ích, cá nhân hóa</li>
          </ul>
          <a href="tel:0582149999" class="btn btn-outline">Nhận Tư Vấn</a>
        </div>

        <div class="pricing-card platinum">
          <h3>Platinum</h3>
          <p>Trọn gói SEO cao cấp nhất cho toàn bộ website trong thời gian dài hạn (ký hợp đồng)</p>
          <div class="price">> 500.000.000 VNĐ</div>
          <ul>
            <li>Thời gian thực hiện: theo thỏa thuận</li>
            <li>Domain & Hosting cao cấp miễn phí</li>
            <li>Tạo lập & Thiết kế website chuyên nghiệp full option</li>
            <li>Tặng các gói Plugin SEO cao cấp miễn phí</li>
            <li>Tối ưu UX/ UI giao diện tùy biến cao cấp</li>
            <li>Dễ dàng đăng bài, quản lý sản phẩm</li>
            <li>Tích hợp nhiều công nghệ AI & tiện ích Internet</li>
            <li>Hỗ trợ & Bảo hành trọn đời</li>
            <li>Backup, sao lưu dữ liệu hàng tuần</li>
            <li>Hỗ trợ full chức năng tương tự những website lớn</li>
            <li>SEO tổng thể, PBN & tặng miễn phí 5 bài PR Báo</li>
          </ul>
          <a href="tel:0582149999" class="btn btn-outline">Nhận Tư Vấn</a>
        </div>
      </div>
    </div>
  </section>

  <section class="stats">
    <div class="container">
      <div class="stats-items">
        <div class="stat-item">
          <h3>Khách hàng tin tưởng</h3>
          <div class="stat-number">1.586 +</div>
        </div>
        <div class="stat-item">
          <h3>Nhận diện thương hiệu</h3>
          <div class="stat-number">95.5 %</div>
        </div>
        <div class="stat-item">
          <h3>Tỷ lệ tương tác</h3>
          <div class="stat-number">93.6 %</div>
        </div>
        <div class="stat-item">
          <h3>Mức độ hài lòng</h3>
          <div class="stat-number">98 %</div>
        </div>
      </div>
    </div>
  </section>

  <section class="seo-value">
    <div class="container">
      <h2 class="section-title">GIÁ TRỊ VƯỢT TRỘI GIÁ SEO TỔNG THỂ</h2>
      <img src="https://ext.same-assets.com/1223310062/1043895465.png" alt="SEO Value Chart" class="seo-chart" />
    </div>
  </section>

  <section class="advantages">
    <div class="container">
      <div class="advantage-items">
        <div class="advantage-item">
          <img src="https://ext.same-assets.com/1223310062/1864002263.png" alt="Brand Awareness" />
          <h3>TĂNG ĐỘ PHỦ THƯƠNG HIỆU</h3>
          <p>
            Tăng độ phủ thương hiệu trên các nền tảng số như: Google, Facebook, Tiktok... Tiếp cận tập khách hàng quan tâm đến sản phẩm hiệu quả và
            tối ưu chi phí hợp lý.
          </p>
        </div>

        <div class="advantage-item">
          <img src="https://ext.same-assets.com/1223310062/2255304786.png" alt="Conversion Rate" />
          <h3>TĂNG TỶ LỆ CHUYỂN ĐỔI</h3>
          <p>
            Tiếp cận những khách hàng có nhu cầu mua hàng cao để gia tăng tính chuyển đổi. Tối ưu trải nghiệm người dùng trên các nền tảng, phù hợp
            với nội dung, sản phẩm của doanh nghiệp.
          </p>
        </div>

        <div class="advantage-item">
          <img src="https://ext.same-assets.com/1223310062/3903385697.png" alt="Checked" />
          <h3>HIỆU QUẢ DUY TRÌ</h3>
          <p>
            Tiếp cận những khách hàng có nhu cầu mua hàng cao để gia tăng tính chuyển đổi. Tối ưu trải nghiệm người dùng trên các nền tảng, phù hợp
            với nội dung, sản phẩm của doanh nghiệp.
          </p>
        </div>
      </div>
      <a href="tel:0582149999" class="btn btn-primary">Đặt lịch tư vấn ngay</a>
    </div>
  </section>

  <section class="partners">
    <div class="container">
      <h2 class="section-title">ĐẠI DIỆN HƠN 200+ ĐỐI TÁC TIÊU BIỂU CỦA H2 MEDIA TRONG HÀNH TRÌNH SUỐT 2 NĂM</h2>
      <div class="partner-logos">
        <img src="https://ext.same-assets.com/1223310062/1519726889.png" alt="Tieu-dung-ban-le" />
        <img src="https://ext.same-assets.com/1223310062/3013302137.png" alt="Y-te-duoc-pham" />
        <img src="https://ext.same-assets.com/1223310062/3033612349.png" alt="Du-lich" />
        <img src="https://ext.same-assets.com/1223310062/1596472427.png" alt="Tham-my-nha-khoa" />
        <img src="https://ext.same-assets.com/1223310062/1519726889.png" alt="Tieu-dung-ban-le" />
      </div>
    </div>
  </section>

  <section class="contact-form">
    <div class="container">
      <h2 class="section-title">ĐĂNG KÝ NGAY ĐỂ NHẬN TƯ VẤN KẾ HOẠCH MIỄN PHÍ CỦA H2 MEDIA CHO DOANH NGHIỆP</h2>
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
  </section>

  <section class="faq">
    <div class="container">
      <h2 class="section-title">CÂU HỎI THƯỜNG GẶP</h2>
      <div class="accordion">
        <div class="accordion-item">
          <div class="accordion-header">1. Tại sao chi phí dịch vụ SEO của H2 MEDIA AGENCY thường hấp dẫn hơn các bên khác?</div>
          <div class="accordion-content">
            <p>
              Đảm bảo kết quả lên TOP bền vững thì chi phí đầu tư cho dịch vụ SEO ban đầu không hề nhỏ. Có nhiều phương pháp khác rẻ hơn và vẫn có
              thể lên được TOP nhưng chúng hoàn toàn không bền vững (SEO blackhat), và có thể khiến website bị phạt hoặc mất Top bất cứ lúc nào. Hơn
              nữa, khi lên được TOP, SEO sẽ là phương pháp mang lại lợi tức đầu tư (ROI) tốt nhất trong các loại hình quảng cáo online, khi mỗi
              click vào website của bạn sẽ không mất thêm đồng nào cả. Cuối cùng, nếu so sánh chi phí dịch vụ SEO Tổng Thể giữa các đơn vị khác hay
              chi phí tự xây dựng phòng SEO, doanh nghiệp sẽ thấy chi phí mà H2 MEDIA AGENCY đưa ra không cao.
            </p>
            <p>
              Ngoài ra, H2 MEDIA AGENCY luôn tạo điều kiện để giúp các doanh nghiệp Start-Up vươn lên. Giúp họ xây dựng hệ thống website chuyên
              nghiệp và hiệu quả trong Marketing.
            </p>
          </div>
        </div>
        <!-- Additional FAQ items would go here -->
      </div>
    </div>
  </section>

  <?php require_once('views/layouts/footer.php'); ?>

  <script src="./assets/js/script.js"></script>
</body>

</html>