<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if($products): ?>

    <section class="products">
      <div class="container-fluid">

        <?php if ($title): ?>
          <h2 class="big-blue text-center"><?= $title ?></h2>
        <?php endif ?>
        
        <div class="content d-flex flex-wrap">

          <?php foreach($products as $post): 

            global $post;
            setup_postdata($post); ?>
            <div class="item fade-in">
              <a href="<?php the_permalink() ?>">
                <figure>
                  <?php the_post_thumbnail('full') ?>

                  <?php if ($field = get_field('hover_image')): ?>
                    <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'hover')) ?>
                  <?php endif ?>

                </figure>
                <div class="text">
                  <p><?php the_title() ?></p>
                </div>

              </a>
            </div>
          <?php endforeach; ?>
          
          <?php wp_reset_postdata(); ?>

        </div>
      </div>
    </section>

  <?php endif; ?>

  <?php endif; ?>