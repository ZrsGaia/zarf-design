<!doctype html>
<html lang="ja">

<head>

  <?php wp_head(); ?>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>

  <header class="header">
    <div class="inner header__inner">

      <h1 class="header__logo">
        <a href="/">
          <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="zarf-design">
        </a>
      </h1>

      <?php
      //グローバルメニューを動的に表示する
      wp_nav_menu(
        array(
          'depth' => 1,
          'theme_location' => 'global', //グローバルメニューをここに表示すると指定
          'container' => 'nav',
          'container_class' => 'global-nav',
          'menu_class' => 'global-nav__list',
        )
      );
      ?>

    </div>

    <div class="header__skew">
      <span class="color-change__text">color-change</span>
      <span class="color-red-change"></span>
      <span class="color-green-change"></span>
      <span class="color-yellow-change"></span>
      <span class="color-main-default-change"></span>
      <span></span>
    </div>

    <div class="drawer-icon">
      <div class="drawer-icon__bars">
        <div class="drawer-icon__bar1"></div>
        <div class="drawer-icon__bar2"></div>
        <div class="drawer-icon__bar3"></div>
      </div>
    </div>

    <div class="drawer-content">


      <div class="drawer-content__logo">
        <a href="/">
          <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="">
        </a>
      </div>

      <?php
      //ドロワーメニューを動的に表示する
      wp_nav_menu(
        array(
          'depth' => 1,
          'theme_location' => 'drawer', //ドロワーメニューをここに表示すると指定
          'container' => 'nav',
          'container_class' => 'drawer-nav',
          'menu_class' => 'drawer-nav__list',
        )
      );
      ?>

      <?php
      //ソーシャルメニューを動的に表示する
      wp_nav_menu(
        array(
          'depth' => 1,
          'theme_location' => 'social', //ソーシャルメニューをここに表示すると指定
          'container' => 'nav',
          'container_class' => 'drawer-nav-sns',
          'menu_class' => 'drawer-nav-sns__list',
        )
      );
      ?>

    </div>

    <div class="drawer-background"></div>

  </header>