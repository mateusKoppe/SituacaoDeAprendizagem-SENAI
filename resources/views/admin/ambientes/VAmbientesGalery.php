<h1 class="simple-title">Galeria de Ambientes</h1>
<hr>
<div>
	<a href="admin/ambientes" class="button button--warning">Voltar</a>
	<hr>
	<div>
		<form name="form" class="form mt--15" method="post" enctype="multipart/form-data">
			<div class="form__section row">
				<label class="col-3">
					<a tabindex="0" role="button" class="button button--primary">Nova Imagem</a>
					<input name="new_image" id="new_image" type="file" class="hide">
					<div id="new_image-label"> </div>
					<script>
						document.getElementById('new_image').onchange = function () {
							var value = this.value.split("\\");
							value = value.reverse()[0];
							document.getElementById('new_image-label').innerHTML = value;
							document.getElementById('add-image-submit').style.display = 'block';
						};
					</script>
				</label>
				<div class="col">
				<button id="add-image-submit" style="display: none;" class="button button--success" type="submit">Adicionar foto</button>
				</div>
			</div>
		</form>
	</div>
	<table class="table table--striped w-100">
		<tr>
			<th>Foto</th>
			<th></th>
		</tr>
		
		<?php foreach ($data['images'] as $key => $image): ?>
		<tr>
			<td class="text--center" style="width: 100%">
				<img style="max-width: 100%;max-height: 200px" src="uploads/<?php echo $image['name'] ?>" alt="">
			</td>
			<td class="text--center">
				<a href="admin/ambientes/excluirfoto/<?php echo $image['id'] ?>" class="button button--danger button--small">Excluir</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>