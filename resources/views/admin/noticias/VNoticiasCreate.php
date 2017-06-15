<h1 class="simple-title">Cadastro noticias</h1>
<hr>
<div>
	<a href="admin/noticias" class="button button--warning">Voltar</a>
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
			<label for="summary" class="label">Resumo</label>
			<textarea name="summary" id="summary" type="text" class="input" placeholder="Resumo"></textarea>
		</div>
		<div class="form__section">
			<label for="description" class="label">Descrição</label>
			<textarea name="description" id="description" type="text" class="input" placeholder="Descrição"></textarea>
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
