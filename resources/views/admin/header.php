<!DOCTYPE html>
<html>
<head>
	<title>SENAI Cursos - Admin</title>
	<meta charset="utf-8">	
	<base href="http://localhost/cursosSenai/">
	<link rel="icon" href="./template/media/favicon.ico" type="image/x-ico">
	<link rel="stylesheet" href="./template/dist/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="bg-dark color-light color-ligth pt--15 pb--15">
	<div class="container">
		<div class="row row--v-justify ">
			<div class="col"><b>Admin</b></div>
			<div class="col text--right"><a href="admin/user/logout" class="color-ligth">Sair (<?php echo $data['user']->getName() ?>)</a></div>
		</div>
	</div>
</header>

<div class="container mt--15">
	<div class="row">
		<div class="col-3">
			<?php include 'menu.php' ?>
		</div>
		<div class="col-9">
			<div class="basic-card">	