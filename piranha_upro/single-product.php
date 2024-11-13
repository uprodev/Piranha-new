<?php get_header(); ?>

<section class="product-header">
	<div class="container-fluid">
		<div class="content">
			<div class="link-back-wrapper fade-in">
				<a href="<?= get_permalink(apply_filters('wpml_object_id', 29, 'page')) . '#products' ?>" class="link-back">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 11 7" width="11" height="7">
						<path d="M0.72,1.64V1.61c0-0.51,0.65-0.8,1.09-0.47L5,4.27c0.25,0.18,0.6,0.18,0.85-0.01l3.06-3.09 C9.34,0.83,10,1.12,10,1.64v0c0,0.18-0.09,0.36-0.24,0.47L5.78,5.86c-0.25,0.19-0.6,0.19-0.85,0L0.96,2.11 C0.8,1.99,0.72,1.82,0.72,1.64z" />
					</svg>
					<?php _e('Повернутися до каталогу', 'Piranha') ?>
				</a>
			</div>

			<div class="text fade-in">
				<div class="row align-items-end justify-content-between">
					<div class="title-item">
						<h1 class="h3"><?php the_title() ?></h1>
					</div>

					<?php if (get_the_content()): ?>
						<div class="text-info"><?php the_content() ?></div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
</section>

<section class="product-details">
	<div class="container-fluid">

		<?php if ($field = get_field('text')): ?>
			<h2 class="h4"><?= $field ?></h2>
		<?php endif ?>
		
		<div class="row">
			<div class="col-lg-6">

				<?php $images = get_field('gallery');
				if($images): ?>

					<div class="product-details-images">

						<?php foreach($images as $image): ?>

							<figure>
								<span>
									<?= wp_get_attachment_image($image['ID'], 'full') ?>
								</span>
							</figure>

						<?php endforeach; ?>

					</div>

				<?php endif; ?>

			</div>
			<div class="col-lg-6">

				<?php if (($items = get_field('items')) && is_array($items) && checkArrayForValues($items)): ?>
				<div class="accordion ">

					<?php foreach ($items as $index => $item): ?>
						<?php if ($item['title'] && $item['text']): ?>
							<div class="accordion-item">
								<h4 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index + 1 ?>" aria-expanded="false" aria-controls="collapse<?= $index + 1 ?>"><?= $item['title'] ?></button>
								</h4>
								<div id="collapse<?= $index + 1 ?>" class="accordion-collapse collapse">
									<div class="accordion-body"><?= $item['text'] ?></div>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
					
				</div>
			<?php endif ?>

			<div class="buttons ">

				<?php if ($field = get_field('video')): ?>
					<a data-fancybox href="<?= $field ?>?autoplay=1" class="btn btn-primary btn-lg"><span data-text="<?php _e('Дивитись відео', 'Piranha') ?>"><?php _e('Дивитись відео', 'Piranha') ?></span></a>
				<?php endif ?>
				
				<a href="<?php the_permalink(apply_filters('wpml_object_id', 119, 'page')) ?>" class="btn btn-dark btn-lg"><span data-text="<?php _e('Подати заявку на отримання', 'Piranha') ?>"><?php _e('Подати заявку на отримання', 'Piranha') ?></span></a>
			</div>
		</div>
	</div>
</div>
</section>

<?php get_footer(); ?>