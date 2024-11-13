<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if (is_array($categories) && checkArrayForValues($categories)): ?>
  <section class="news-block">
    <div class="container-fluid">
      <div class="content">

        <?php foreach ($categories as $item): ?>
          <?php if ($item['category']): ?>

            <?php 
            $args = array(
              'post_type' => 'post', 
              'cat' => $item['category']->term_id, 
              'posts_per_page' => -1,
              'paged' => get_query_var('paged')
            );
            $wp_query = new WP_Query($args);
            if($wp_query->have_posts()): 
              ?>

              <div class="item-wrap">
                <h2 class="title"><?= $item['category']->name ?></h2>
                <div class="d-flex flex-wrap">

                  <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

                    <?php $is_first_and_full_width = $item['is_full_width_of_first_post'] && $wp_query->current_post == 0 ?>

                    <?php if ($is_first_and_full_width): ?>
                      <div class="item fade-in item-full">
                        <a href="<?php the_permalink() ?>">
                          <div class="bg">
                            <?php the_post_thumbnail('full') ?>
                          </div>
                          <div class="wrap-content">
                            <div class="data"><?= get_the_date() ?></div>
                            <div class="bottom">
                              <h1><?php the_title() ?></h1>
                              <p class="text"><?= get_the_excerpt() ?></p>
                            </div>
                          </div>
                        </a>
                      </div>
                    <?php else: ?>
                      <div class="item fade-in">
                        <a href="<?php the_permalink() ?>">
                          <div class="bg">
                            <?php the_post_thumbnail('full') ?>
                          </div>
                          <div class="wrap-content">
                            <div class="bottom">
                              <div class="data"><?= get_the_date() ?></div>
                              <h2 class="title-item"><?php the_title() ?></h2>
                            </div>
                          </div>
                        </a>
                      </div>
                    <?php endif ?>
                    
                  <?php endwhile; ?>

                </div>
              </div>

              <?php 
            endif;
            wp_reset_query(); 
            ?>

          <?php endif ?>
        <?php endforeach ?>

      </div>
    </div>
  </section>
<?php endif ?>

<?php endif; ?>