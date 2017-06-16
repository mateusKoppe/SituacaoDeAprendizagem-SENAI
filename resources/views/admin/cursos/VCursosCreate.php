<h1 class="simple-title">Cadastro de Cursos</h1>
<hr>
<div>
	<a href="admin/cursos" class="button button--warning">Voltar</a>
	<hr>
	<form name="form" class="form mt--15" method="post" enctype="multipart/form-data">
		<div class="form__section">
			<span class="pr--10 pl--10">
				<input type="checkbox" value="1" id="active" name="active" checked="">
				<label for="active">Ativo</label>
			</span>
			<span class="pr--10 pl--10">
				<input type="checkbox" value="1" id="featured" name="featured">
				<label for="featured">Destaque</label>
			</span>
		</div>
		<div class="form__section">
			<label for="name" class="label">Nome</label>
			<input name="name" required id="name" type="text" class="input" placeholder="Nome">
		</div>
		<div class="form__section">
			<div class="row">
				<div class="col">
					<label for="category" class="label">Categoria</label>
					<select name="category" required id="category" type="text" style="height: 45px" class="input">
						<?php foreach($data['categories'] as $category): ?>
						<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col">
					<label for="workload" class="label">Carga horária</label>
					<input name="workload" min="0" id="workload" type="number" class="input" placeholder="Carga horária">
				</div>
			</div>
		</div>
		<div class="form__section">
			<div class="row">
				<div class="col">
					<label for="period" class="label">Período</label>
					<select name="period" required id="period" type="text" style="height: 45px" class="input">
						<option value="1">Matutino</option>
						<option value="2">Vespertino</option>
						<option value="3">Noturno</option>
					</select>
				</div>
				<div class="col">
					<label for="area" class="label">Área</label>
					<input name="area" required id="area" type="text" class="input" placeholder="Área">
				</div>
			</div>
		</div>
		<div class="form__section">
			<label for="description" class="label">Descrição</label>
			<textarea name="description" id="description" type="text" class="input" placeholder="Descrição"></textarea>
		</div>
		<div class="form__section">
			<label for="objective" class="label">Objetivo</label>
			<textarea name="objective" id="objective" type="text" class="input" placeholder="Objetivo"></textarea>
		</div>
		<div class="form__section">
			<label for="target" class="label">Público alvo</label>
			<textarea name="target" id="target" type="text" class="input" placeholder="Público alvo"></textarea>
		</div>
		<div class="form__section">
			<label>
				<a tabindex="0" role="button" class="button button--primary">Imagem principal</a>
				<input name="primary_image" id="primary_image" type="file" accept="image/*" class="hide">
				<div id="primary_image-label"> </div>
				<script>
					document.getElementById('primary_image').onchange = function () {
						var value = this.value.split("\\");
						value = value.reverse()[0];
						document.getElementById('primary_image-label').innerHTML = value;
					};
				</script>
			</label>
		</div>
		<div class="form__section">
			<button class="button button--success">Salvar</button>
		</div>
	</form>
</div>
