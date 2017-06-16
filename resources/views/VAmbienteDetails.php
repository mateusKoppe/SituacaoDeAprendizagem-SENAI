<div class="container page-content">	
	<h1 class="main-title"><?php echo $data['environments']->getName() ?></h1>
	<?php if($data['environments']->getPrimaryImage()): ?>
	<div class="text--center">
		<img class="img-responsive img-responsive--reduce-only" src="uploads/<?php echo $data['environments']->getPrimaryImage() ?>" alt="">
		<br>
		<br>
	</div>
	<?php endif; ?>
	<section>
		<h2 class="main-title">Descrição</h2>
		<div>
			<?php echo $data['environments']->getDescription() ?>
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
</div>