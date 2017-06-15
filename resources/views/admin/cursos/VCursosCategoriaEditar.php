<h1 class="simple-title">Cadastro de Ambientes</h1>
<hr>
<div>
	<a href="admin/ambientes" class="button button--warning">Voltar</a>
	<hr>
	<form name="form" class="form mt--15" method="post" enctype="multipart/form-data">
		<div class="form__section">
			<label for="name" class="label">Nome</label>
			<input name="name" required id="name" type="text" value="<?php echo $data['category']['name'] ?>" class="input" placeholder="Nome">
		</div>
		<div class="form__section">
			<label for="description" class="label">Descrição</label>
			<textarea name="description" id="description" type="text" class="input" placeholder="Descrição"><?php echo value_or_default($data['category']['description'], "") ?></textarea>
		</div>
		<div class="form__section">
			<button class="button button--success">Salvar</button>
		</div>
	</form>
</div>
