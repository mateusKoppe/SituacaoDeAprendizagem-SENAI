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
	<div class="bg-primary h-100">
		<div class="container h-100">
			<div class="row h-100 row--v-center row--h-center">
				<div class="col-4 col-lg-5 col-md-7 col-sm-10 col-xs-12">
					<div class="card">
						<h2 class="text--center">Por favor faça o login</h2>
						
						<?php if(@$data['error']): ?>
							<div class="alert alert--danger"><?php echo $data['error'] ?></div>
							<br>
						<?php endif; ?>

						<form action="" class="form" method="post">
							<div class="form__section">
								<input type="text" name="login" class="input" placeholder="Login" required>
							</div>
							<div class="form__section">
								<input type="password" name="password" class="input" placeholder="Senha" required>
							</div>
							<div class="form__section">
								<button class="button button--block">Login</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>