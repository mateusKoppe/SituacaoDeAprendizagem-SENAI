<div class="container page-content">	
	<h1 class="main-title"><?php echo $data['category']['name'] ?></h1>
	<p><?php echo $data['category']['description'] ?></p>
	</section>
	<ul>
		<?php foreach($data['coursesCategories'] as $course): ?>
		<li><?php echo $course['name'] ?></li>
		<?php endforeach; ?>
	</ul>
</div>