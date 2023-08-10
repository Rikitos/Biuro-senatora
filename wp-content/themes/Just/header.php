<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="header__container">
      <div class="header__container__logo">
        <img class="header__container__logo_title-img1" src="" alt="">
        <p class="header__container__logo_title-top"></p>
        <p class="header__container__logo_title-bot"></p>
        <img class="header__container__logo_title-img2" src="" alt="">
      </div>

      <div class="header__container__navigation header__navigation">
        <nav class="header__navigation__container">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'headerMainMenu',
            )
          );
          ?>
        </nav>
      </div>

      <div class="header__container__socials">
          <i>fb</i>
          <i>twitter</i>
          <i>instagram</i>
          <i>tik</i>
          <i>fb</i>
      </div>

    </div>
    

  </header>