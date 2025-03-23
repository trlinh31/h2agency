<?php  
  $checkAuth = false;
  if(!isset($_SESSION['name'])){
    $checkAuth = false;
  }
  else{
    $checkAuth = true;
  }

?>
<header class="header">
  <div class="container">
    <div class="logo">
      <a href="./"><img src="https://ext.same-assets.com/1223310062/170333504.png" alt="h2 logo" /></a>
    </div>
    <nav class="main-nav">
      <ul>
        <li><a href="./lien-he">Liên Hệ</a></li>
        <li><a href="./dang-nhap">Tài khoản</a></li>
        <?php if($checkAuth): ?>
          <li><a href=""><?php echo $_SESSION['name'] ?></a></li>
          <li><a href="./dang-xuat">Dang xuat</a></li>
        <?php endif; ?>
        <li><a href="./dang-nhap"></a></li>
      </ul>
    </nav>
  </div>
</header>