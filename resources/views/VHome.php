<main>
	<div class="banner-slider banner-slider--js">
		<div class="banner-top-slider banner-slider__wrapper">
			<div class="banner-slider__slide"><img src="./template/media/banner1.jpg"></div>
			<div class="banner-slider__slide"><img src="./template/media/banner2.jpg"></div>
			<div class="banner-slider__slide"><img src="./template/media/banner3.jpg"></div>
			<div class="banner-slider__slide"><img src="./template/media/banner4.jpg"></div>
		</div>
	</div>
	<div class="container">
		<h1 class="main-title">SENAI Concórdia</h1>
		<p>Serviço Nacional de Aprendizagem Industrial (SENAI) é uma instituição privada brasileira de interesse público, sem fins lucrativos, com personalidade jurídica de direito privado, está fora da administração pública. Foi apontado pela Organização das Nações Unidas (ONU) em 2016 como uma das principais instituições educacionais do Hemisfério sul.[2] Compõe o chamado Terceiro Setor. </p>
		<p>Fique sabendo o que está acontecendo no SENAI de Concórdia, increva sem cursos, veja os ambientes, e fique ligado nas nototícia!</p>
		<section class="mt--15">
			<div class="row">
				<div class="col">
					<h2 class="main-title">Cursos</h2>
				</div>
				<div class="col col--v-center text--right">
					<a href="curso" class="button button--primary mt--15">Veja todos</a>
				</div>
			</div>
			<div class="row">
				<?php foreach ($data['featuredCourses'] as $key => $course): ?>
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
		</section>

		<section class="mt--15">
			<div class="row">
				<div class="col">
					<h2 class="main-title">Novidades</h2>
				</div>
				<div class="col col--v-center text--right">
					<a href="noticias" class="button button--primary mt--15">Veja todos</a>
				</div>
			</div>
			<div class="row">
				<?php foreach ($data['featuredNews'] as $key => $new): ?>
				<?php if($key > 2) break; ?>
				<div class="col-4 col-md-6 col-sm-12 mb--15">
						<div class="card">
							<div class="card__image" style="background-image: url(uploads/<?php echo $new->getPrimaryImage() ?>)">
							</div>
							<div>
								<h2 class="main-title"><?php echo $new->getName() ?></h2>
								<p><?php echo $new->getSummary() ?></p>
							</div>
							<br>
							<a href="curso/vermais/<?php echo $new->getId() ?>" class="button button--main button--block">Ver mais</a>
						</div>
				</div>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="mt--15">
			<div class="row">
				<div class="col">
					<h2 class="main-title">Ambientes</h2>
				</div>
				<div class="col col--v-center text--right">
					<a href="curso" class="button button--primary mt--15">Veja todos</a>
				</div>
			</div>
			<div class="row">
				<?php foreach ($data['featuredEnvironments'] as $key => $course): ?>
				<?php if($key > 2) break; ?>
				<div class="col-4 col-md-6 col-sm-12 mb--15">
						<div class="card">
							<div class="card__image" style="background-image: url(uploads/<?php echo $course->getPrimaryImage() ?>)">
							</div>
							<div>
								<h2 class="main-title"><?php echo $course->getName() ?></h2>
							</div>
							<br>
							<a href="ambientes" class="button button--main button--block">Ver mais</a>
						</div>
				</div>
				<?php endforeach; ?>
			</div>
		</section>
		<br>
	</div>
</main>