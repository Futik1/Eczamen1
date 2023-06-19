<?php
  require_once "vendor/autoload.php";
  use App\DB;
  $db = new DB();
  if (isset($_SESSION["user_id"])) {
    $user = $db->get_user_by_id($_SESSION["user_id"]);
  }
  
?>

<header>
  <a href="index.php" class="logo">
    <img src="assets/images/zoo-de-lisboa.svg" alt="Logo">
  </a>
  <div class="contacts">
    <div class="link"><a href="tel:+77077077070"><img src="assets/images/phone-alt-svgrepo-com.svg" alt=""></a></div>
    <div class="link"><a href="#"><img src="assets/images/facebook-svgrepo-com.svg" alt=""></a></div>
    <div class="link"><a href="#"><img src="assets/images/twitter-svgrepo-com.svg" alt=""></a></div>
    <div class="link"><a href="#"><img src="assets/images/instagram-svgrepo-com.svg" alt=""></a></div>
    <div class="link"><a href="#"><img src="assets/images/vk-svgrepo-com.svg" alt=""></a></div>
  </div>
  <div class="user">
    <?php if (!isset($_SESSION["user_id"])) : ?>
      <button id="show_popup_login">Войти</button>
    <form action="admin.php">
      <button >Админ</button>
    </form>
    <?php else : ?>
      <p>Привет, <?= $user["Name"] ?></p>
      <a href="ajax/logout.php">
        <button>Выход</button>
      </a>
    <?php endif ?>
    <a href="cart.php">
      <img src="assets/images/cart-svgrepo-com.svg" alt="">
    </a>
    <button id="show_popup_search" class="icon">
      <img src="assets/images/search-svgrepo-com.svg" alt="">
    </button>
  </div>

  <div id="popup_search" class="">
    <div class="inner_container">
      <form action="">
        <div>
          <label for="query">Поисковый запрос</label>
          <input id="query" type="text">
        </div>
        <button id="search">Искать</button>
      </form>
      <div class="result" id="search_result">

      </div>
    </div>
  </div>

  <div id="popup_login" class="">
    <div class="inner_container">
      <form id="login_form" action="ajax/login.php" method="post">
        <div>
          <label for="login">Логин</label>
          <input name="login" id="login" type="text">
          <label for="password">Пароль</label>
          <input name="password" id="password" type="password">
        </div>
        <button>Войти</button>
        <button id="switch_to_register">Регистрация</button>
      </form>
      <form id="register_form" action="ajax/register.php" style="display: none" method="post">
        <div>
          <label for="register_login">Логин *</label>
          <input name="login" id="register_login" type="email" required>
          <label for="register_password">Пароль *</label>
          <input name="password" id="register_password" type="password" required>
          <label for="register_name">Имя *</label>
          <input name="name" id="register_name" type="text" required>
          <label for="register_phone">Телефон</label>
          <input name="phone" id="register_phone" type="tel">
        </div>
        <button>Зарегестрироваться</button>
        <button id="switch_to_login">Авторизация</button>
      </form>
    </div>
  </div>
</header>