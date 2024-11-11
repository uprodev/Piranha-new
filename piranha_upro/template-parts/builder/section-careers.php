<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="careers">
    <div class="container-fluid">
      <div class="content">
        <div class="title text-center">

          <?php if ($title): ?>
            <h1><?= $title ?></h1>
          <?php endif ?>

          <?= $text ?>

        </div>
        <div class="form-wrap d-flex flex-wrap">

          <?php if ($image): ?>
            <figure class="fade-in">
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </figure>
          <?php endif ?>

          <?php if ($form): ?>
            <div class="wrap">

              <?php if ($form_title): ?>
                <h3 class="h3"><?= $form_title ?></h3>
              <?php endif ?>
              
              <?= do_shortcode('[contact-form-7 id="' . $form . '" html_class="default-form"]') ?>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>