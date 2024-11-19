<?php get_header(); ?>

<section class="block-404">
	<div class="container-fluid text-center fade-in-wrapper">

		<?php if ($field = get_field('title_404', 'option')): ?>
			<h1><?= $field ?></h1>
		<?php endif ?>

		<?php if ($field = get_field('link_404', 'option')): ?>
			<a href="<?= $field['url'] ?>" class="btn btn-dark"<?php if($field['target']) echo ' target="_blank"' ?>><span data-text="Повернутись на головну"><?= $field['title'] ?></span></a>
		<?php endif ?>

	</div>
</section>

<?php get_footer(); ?>