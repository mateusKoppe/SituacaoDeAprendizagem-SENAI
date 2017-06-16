<div class="container page-content">	
	<h1 class="main-title"><?php echo $data['category']['name'] ?></h1>
	<p><?php echo $data['category']['description'] ?></p>
	</section>
	<div class="row">
		<?php foreach($data['courses'] as $course): ?>
		<div class="col-4 col-md-6 col-sm-12 mb--15">
				<div class="card">
					<div class="card__image" style="background-image: url(uploads/<?php echo $course->getPrimaryImage() ?>)">
					</div>
					<div>
						<h2 class="main-title"><?php echo $course->getName() ?></h2>
					</div>
					<br>
					<a href="curso/vermais/<?php echo $course->getId() ?>" class="button button--main button--block">Ver mais</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
