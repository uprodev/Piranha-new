<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if($news): ?>

    <section class="news">
      <div class="container-fluid">
        <div class="wrap">

          <?php if ($link): ?>
            <div class="btn-wrap">
              <a href="<?= $link['url'] ?>" class="btn-border"<?php if($link['target']) echo ' target="_blank"' ?>>
                <span><?= $link['title'] ?></span>
                <span><?= $link['title'] ?></span>
              </a>
            </div>
          <?php endif ?>

          <div class="content d-flex flex-wrap align-items-end">

            <?php foreach($news as $post): 

              global $post;
              setup_postdata($post); ?>
              <div class="item">
                <a href="<?php the_permalink() ?>">
                  <figure>
                    <?php the_post_thumbnail('full') ?>
                    <p><?php the_title() ?></p>
                  </figure>
                </a>
              </div>
            <?php endforeach; ?>

            <?php wp_reset_postdata(); ?>

          </div>
        </div>
      </div>
    </section>

  <?php endif; ?>

  <?php endif; ?>