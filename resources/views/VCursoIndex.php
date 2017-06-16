<div class="container page-content">	
	<h1 class="main-title">Cursos</h1>
	<p>Veja os cursos abertos, não perca tempo, inscreva-se em algum deles!</p>
	</section>
		<?php foreach($data['categoryCourses'] as $category): ?>
		<div class="row">
			<div class="col">
				<h2 class="main-title"><?php echo $category['name'] ?></h2>
			</div>
			<div class="col col--v-center text--right">
				<a href="curso/categoria/<?php echo $category['id'] ?>" class="button button--primary mt--5">Veja todos</a>
			</div>
		</div>
		<div class="row">
			<?php foreach ($category['courses'] as $key => $course): ?>
			<?php if($key > 2) break; ?>
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
		<?php endforeach; ?>
</div>
