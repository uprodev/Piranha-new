<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="contacts">
    <div class="container-fluid">
      <div class="content d-flex flex-wrap">
        <div class="title fade-in">

          <?php if ($title): ?>
            <h1><?= $title ?></h1>
          <?php endif ?>

          <?= $text ?>

        </div>

        <?php if ($form): ?>
          <div class="form-wrap fade-in">

            <?php if ($form_title): ?>
              <h3 class="h3"><?= $form_title ?></h3>
            <?php endif ?>

            <?= do_shortcode('[contact-form-7 id="' . $form . '" html_class="default-form"]') ?>
          </div>
        <?php endif ?>

        <?php if (is_array($locations['items']) && checkArrayForValues($locations['items'])): ?>
        <div class="bottom d-flex flex-wrap fade-in">

          <?php if ($locations['title']): ?>
            <h5><img src="<?= get_stylesheet_directory_uri() ?>/img/loc.svg" alt=""><?= $locations['title'] ?></h5>
          <?php endif ?>
          
          <?php foreach ($locations['items'] as $item): ?>
            <div class="item">

              <?php if ($item['flag'] || $item['title']): ?>
                <h6>

                  <?php if ($item['flag']): ?>
                    <?= wp_get_attachment_image($item['flag']['ID'], 'full') ?>
                  <?php endif ?>

                  <?= $item['title'] ?>
                </h6>
              <?php endif ?>

              <?= $item['text'] ?>

              <?php if (is_array($item['links']) && checkArrayForValues($item['links'])): ?>
              <?php foreach ($item['links'] as $item_2): ?>
                <?php if ($item_2['link']): ?>
                  <p>
                    <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>>

                      <?php if ($item_2['icon']): ?>
                        <?= wp_get_attachment_image($item_2['icon']['ID'], 'full') ?>
                      <?php endif ?>
                      
                      <?= $item_2['link']['title'] ?>
                    </a>
                  </p>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>

          </div>
        <?php endforeach ?>

      </div>
    <?php endif ?>

  </div>
</div>
</section>

<?php endif; ?>