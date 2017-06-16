<div class="container page-content">
	<h1 class="main-title">
		Ambientes
		<small>Veja quais são as ambientes no SENAI Concórdia.</small>
	</h1>
	<div class="row">
		<?php foreach ($data['environments'] as $key => $environment): ?>
			<div class="col-4 col-md-6 col-sm-12 mb--15">
				<div class="card">
					<div class="card__image" style="background-image: url(uploads/<?php echo $environment->getPrimaryImage() ?>)">
					</div>
					<div>
						<h2 class="main-title"><?php echo $environment->getName() ?></h2>
					</div>
					<br>
					<a href="ambientes/vermais/<?php echo $environment->getId() ?>" class="button button--main button--block">Ver mais</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>