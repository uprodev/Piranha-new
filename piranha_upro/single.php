<?php get_header(); ?>

<section class="text-default">
	<div class="container-fluid">
		<div class="content">
			<h1><?php the_title() ?></h1>
			<figure>
				<?php the_post_thumbnail() ?>
				<figcaption><?= get_the_date() ?></figcaption>
			</figure>

			<?php the_content() ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>