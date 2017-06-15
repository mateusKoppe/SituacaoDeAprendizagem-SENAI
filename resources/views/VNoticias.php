<div class="container page-content">
	<h1 class="main-title">
		Noticias
		<small>veja quais são as novidades no SENAI Concórdia.</small>
	</h1>
	<div class="row">
		<?php foreach ($data['news'] as $key => $new): ?>
			<div class="col-4 col-md-6 col-sm-12 mb--15">
				<div class="card">
					<div class="card__image" style="background-image: url(uploads/<?php echo $new->getPrimaryImage() ?>)">
					</div>
					<div>
						<h2 class="main-title"><?php echo $new->getName() ?></h2>
						<p>
							<?php echo $new->getSummary() ?>
						</p>
					</div>
					<br>
					<a href="noticias/ver-mais/<?php echo $new->getId() ?>" class="button button--main button--block">Ver mais</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>