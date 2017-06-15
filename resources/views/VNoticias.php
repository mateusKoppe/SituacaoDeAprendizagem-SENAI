<div class="container page-content">
	<h1 class="main-title">
		Noticias
		<small>veja quais são as novidades no SENAI Concórdia.</small>
	</h1>
	<?php foreach ($data['news'] as $key => $new): ?>
		<div class="card">
			<div class="card__image"> style="background-image: url(uploads/<?php echo $new->getPrimaryImage() ?>)">
			</div>
		</div>
	<?php endforeach; ?>
</div>