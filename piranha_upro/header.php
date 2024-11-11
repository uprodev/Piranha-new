<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<?php $body_class = is_front_page() ? 'home' : is_page(119) ? 'bg-green' : '' ?>
<body <?php body_class($body_class); ?>>
  <?php wp_body_open(); ?>
  <header class="header header-light<?php if(get_field('header_border')) echo ' header-border' ?>">
    <div class="header-main">
      <div class="container-fluid">
        <div class="d-flex align-items-center">

          <?php if ($field = get_field('logo_h', 'option')): ?>
            <div class="header-logo">
              <a href="<?= get_home_url() ?>">
                <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'img-svg')) ?>
              </a>
            </div>
          <?php endif ?>
          
          <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        </div>
        <div class="d-flex align-items-center">

          <?php custom_language_switcher() ?>

          <?php if ($field = get_field('link_h', 'option')): ?>
            <div class="header-btn">
              <a href="<?= $field['url'] ?>" class="btn"<?php if($field['target']) echo ' target="_blank"' ?>><span data-text="<?= $field['title'] ?>"><?= $field['title'] ?></span></a>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>

    <nav class="header-navbar">
      <div class="container-fluid">
        <button class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="navigation-main">

          <?php wp_nav_menu( array(
            'theme_location'  => 'header',
            'container'       => '',
            'items_wrap'      => '<ul>%3$s</ul>'
          )); ?>

        </div>

        <?php if ($field = get_field('download_h', 'option')): ?>
          <div class="header-navbar-bottom">
            <a href="<?= $field['url'] ?>" class="btn-border" download>
              <span><img src="<?= get_stylesheet_directory_uri() ?>/img/download.svg" alt=""><?php _e('Завантажити каталог', 'Piranha') ?></span>
              <span><img src="<?= get_stylesheet_directory_uri() ?>/img/download.svg" alt=""><?php _e('Завантажити каталог', 'Piranha') ?></span>
            </a>
          </div>
        <?php endif ?>
        
      </div>
    </nav>
  </header>

  <div class="global-wrapper">

    <?php if (is_front_page()): ?>
      <section class="home-banner" style="background: #000;">

        <?php if ($field = get_field('image_1')): ?>
          <div class="bg">
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          </div>
        <?php endif ?>
        
        <?php if ($field = get_field('video_1')): ?>
          <div class="video">
            <video src="<?= $field['url'] ?>" autoplay muted loop playsinline></video>
          </div>
        <?php endif ?>

        <div class="text">

          <?php if ($field = get_field('subtitle_1')): ?>
            <p><?= $field ?></p>
          <?php endif ?>

          <?php if ($field = get_field('title_1')): ?>
            <div class="title-animated">
              <h1>
                <span><?= $field ?></span>
                <span><?= $field ?></span>
                <span><?= $field ?></span>
              </h1>
            </div>
          <?php endif ?>

          <?php if ($field = get_field('download_1')): ?>
            <div class="btn-wrap">
              <a href="<?= $field['url'] ?>" class="btn-download" download>
                <span><img src="<?= get_stylesheet_directory_uri() ?>/img/download.svg" alt=""><?php _e('Завантажити каталог', 'Piranha') ?></span>
                <span><img src="<?= get_stylesheet_directory_uri() ?>/img/download.svg" alt=""><?php _e('Завантажити каталог', 'Piranha') ?></span>
              </a>
            </div>
          <?php endif ?>

        </div>
      </section>
    <?php endif ?>

    <main>