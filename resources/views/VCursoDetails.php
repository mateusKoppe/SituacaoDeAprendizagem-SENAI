<div class="container page-content">	
	<h1 class="main-title"><?php echo $data['course']->getName() ?></h1>
	<?php if($data['course']->getPrimaryImage()): ?>
	<div class="text--center">
		<img class="img-responsive img-responsive--reduce-only" src="uploads/<?php echo $data['course']->getPrimaryImage() ?>" alt="">
		<br>
		<br>
	</div>
	<?php endif; ?>
	<div class="row">
		<div class="col col--slink"><b>Área:</b> <?php echo $data['course']->getArea() ?></div>
		<div class="col col--slink"><b>Carga horária:</b> <?php echo $data['course']->getWorkload() ?> hrs</div>
	</div>
	<section>
		<h2 class="main-title">Descrição</h2>
		<div>
			<?php echo $data['course']->getDescription() ?>
		</div>
	</section>
	<section>
		<h2 class="main-title">Objetivo</h2>
		<div>
			<?php echo $data['course']->getDescription() ?>
		</div>
	</section>
	<!-- <section>
		<h2 class="main-title">Compotências</h2>
		<ul>
			<li>Monta, inspeciona e instala equipamentos e máquinas industriais integradas a sistemas contínuos. Documentam informações técnicas; realizam ações de qualidade e preservação ambiental e trabalham segundo normas de segurança.</li>

			<li>Auxiliam em projetos, programas, controle, instalação e manutenção de sistemas de automação. Realizam manutenção em equipamentos e máquinas industriais integradas a sistemas contínuos Documentam informações técnicas; realizam ações de qualidade e preservação ambiental e trabalham segundo normas de segurança.</li>
		</ul>
	</section> -->	
	<!-- <div class="banner-slider banner-slider--js">
		<div class="banner-top-slider banner-slider__wrapper">
			<div class="banner-slider__slide"><img src="./template/media/banner1.jpg"></div>
			<div class="banner-slider__slide"><img src="./template/media/banner2.jpg"></div>
			<div class="banner-slider__slide"><img src="./template/media/banner3.jpg"></div>
			<div class="banner-slider__slide"><img src="./template/media/banner4.jpg"></div>
		</div>
	</div> -->
	<section>
		<h2 class="main-title">Público alvo</h2>
		<div>
			<?php echo $data['course']->getTarget() ?>
		</div>
	</section>
</div>