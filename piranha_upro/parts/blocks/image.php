<?php if ($field = get_field('image')): ?>
	<figure>
		<?= wp_get_attachment_image($field['ID'], 'full') ?>
	</figure>
	<?php endif ?>