<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="home-section-1">
    <div class="container-fluid">
      <div class="content">
        <div class="title-wrap ">

          <?php if ($title): ?>
            <div class="title">
              <h2><?= $title ?></h2>
            </div>
          <?php endif ?>
          
          <?php if ($text): ?>
            <div class="right">
              <h6><?= $text ?></h6>
            </div>
          <?php endif ?>
          
        </div>

        <?php if (is_array($items) && checkArrayForValues($items)): ?>
        <?php foreach ($items as $item): ?>
          <div class="item">
            <figure>
              <?php if ($item['image']): ?>
                <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
              <?php endif ?>
            </figure>

            <?php if ($item['text']): ?>
              <div class="right"><?= $item['text'] ?></div>
            <?php endif ?>
            
          </div>
        <?php endforeach ?>
      <?php endif ?>

    </div>
  </div>
</section>

<?php endif; ?>