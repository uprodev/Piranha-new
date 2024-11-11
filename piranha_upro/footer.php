</main>

<footer>
  <div class="container-fluid">
    <div class="border"></div>
    <div class="content d-flex flex-wrap">
      <div class="left d-flex flex-wrap">

        <?php if ($field = get_field('logo_f', 'option')): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'img-svg')) ?>
            </a>
          </div>
        <?php endif ?>

        <?php if (($items = get_field('addresses_f', 'option')) && is_array($items) && checkArrayForValues($items)): ?>
        <?php foreach ($items as $item): ?>
          <div class="item">

            <?php if ($item['flag'] || $item['country']): ?>
              <h6>

                <?php if ($item['flag']): ?>
                  <?= wp_get_attachment_image($item['flag']['ID'], 'full') ?>
                <?php endif ?>

                <?= $item['country'] ?>
              </h6>
            <?php endif ?>
            
            <?= $item['text'] ?>

          </div>
        <?php endforeach ?>
      <?php endif ?>

    </div>
    <div class="right d-flex justify-content-end flex-wrap">

      <?php if ($locations = get_nav_menu_locations()): ?>

        <?php foreach ($locations as $index => $menu): ?>

          <?php if (str_contains($index, 'footer') && has_nav_menu($index)): ?>
          <nav class="item-menu">

            <?php wp_nav_menu( array(
              'theme_location'  => $index,
              'container'       => '',
              'items_wrap'      => '<ul>%3$s</ul>'
            ) ); ?>

          </nav>
        <?php endif ?>

      <?php endforeach ?>

    <?php endif ?>

    <?php if ($field = get_field('link_1_f', 'option')): ?>
      <div class="btn-wrap">
        <a href="<?= $field['url'] ?>" class="btn"<?php if($field['target']) echo ' target="_blank"' ?>><span data-text="<?= $field['title'] ?>"><?= $field['title'] ?></span></a>
      </div>
    <?php endif ?>

  </div>
  <div class="bottom w-100 d-flex flex-wrap align-items-center justify-content-between">

    <?php if ($field = get_field('copyright_f', 'option')): ?>
      <p><?= $field ?></p>
    <?php endif ?>

    <?php if ($field = get_field('link_2_f', 'option')): ?>
      <p>
        <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
      </p>
    <?php endif ?>

  </div>
</div>
</div>
</footer>
</div>

<?php wp_footer() ?>
</body>
</html>