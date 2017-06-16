<!DOCTYPE html>
<html>
<head>
	<title>SENAI Cursos</title>
	<meta charset="utf-8">	
	<base href="http://localhost/cursosSenai/">
	<link rel="icon" href="./template/media/favicon.ico" type="image/x-ico">
	<link rel="stylesheet" href="./template/dist/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<header id="main-header">
		<nav class="institutions-menu">
			<div class="container">
				<ul class="institutions-menu__list">
					<li class="institutions-menu__item">
						<a class="institutions-menu__link" href="http://fiesc.com.br" target="blank">FIESC</a>
					</li>
					<li class="institutions-menu__item">
						<a class="institutions-menu__link" href="http://ciesc.com.br" target="blank">CIESC</a>
					</li>
					<li class="institutions-menu__item">
						<a class="institutions-menu__link" href="http://sesisc.org.br" target="blank">SESI</a>
					</li>
					<li class="institutions-menu__item">
						<a class="institutions-menu__link" href="http://sc.senai.br" target="blank">SENAI</a>
					</li>
					<li class="institutions-menu__item">
						<a class="institutions-menu__link" href="http://ielsc.org.br" target="blank">IEL</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main-header-content">
			<div class="container container--full-height">
				<div class="row row--full-height">
					<div class="col-5 col--v-center">
						<a href="">
							<img class="img-responsive img-responsive--reduce-only" src="./template/media/logo-with-description.png">
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="main-nav-content">
			<div class="main-nav-content__container container container--no-gutter container--full-height">
				<nav class="row row--no-gutter row--full-height">
					<ul class="col main-nav-content__list">
						<li class="main-nav-content__item">
							<a class="main-nav-content__link" href="ambientes">Ambientes</a>
						</li>
						<li class="main-nav-content__item">
							<a class="main-nav-content__link" href="institucional">Institucional</a>
						</li>
						<li class="main-nav-content__item">
							<a class="main-nav-content__link" href="curso">Cursos</a>
							<ul class="main-nav-content__submenu">
								<?php foreach ($data['coursesCategories'] as $key => $category): ?>
									<li class="main-nav-content__item">
										<a href="curso/categoria/<?php echo $category['id']?>" class="main-nav-content__link"><?php echo $category['name']?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
						<!-- <li class="main-nav-content__item">
							<a class="main-nav-content__link">Ensino Médio</a>
						</li> -->
						<li class="main-nav-content__item">
							<a class="main-nav-content__link" href="noticias">Noticías</a>
						</li>
						<li class="main-nav-content__item">
							<a class="main-nav-content__link" href="contato">Contato</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>