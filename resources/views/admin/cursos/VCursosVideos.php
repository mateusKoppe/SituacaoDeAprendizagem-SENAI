<h1 class="simple-title">Vídeos de Ambientes</h1>
<hr>
<div>
	<a href="admin/ambientes" class="button button--warning">Voltar</a>
	<hr>
	<div>
		<form name="form" class="form mt--15" method="post" enctype="multipart/form-data">
			<div class="form__section row">
				<label class="col-3">
					<a tabindex="0" role="button" class="button button--primary">Novo Vídeo</a>
					<input name="new_video" id="new_video" type="file" accept="video/*" class="hide">
					<div id="new_video-label"> </div>
					<script>
						document.getElementById('new_video').onchange = function () {
							var value = this.value.split("\\");
							value = value.reverse()[0];
							document.getElementById('new_video-label').innerHTML = value;
							document.getElementById('add-video-submit').style.display = 'block';
						};
					</script>
				</label>
				<div class="col">
				<button id="add-video-submit" style="display: none;" class="button button--success" type="submit">Adicionar vídeo</button>
				</div>
			</div>
		</form>
	</div>
	<table class="table table--striped w-100">
		<tr>
			<th>Vídeo</th>
			<th></th>
		</tr>
		
		<?php foreach ($data['videos'] as $key => $video): ?>
		<tr>
			<td class="text--center" style="width: 100%">
				<video style="max-width: 100%;max-height: 200px" alt="" controls="">
					<source src="uploads/<?php echo $video['name'] ?>">
				</video>
			</td>
			<td class="text--center">
				<a href="admin/ambientes/excluirvideo/<?php echo $video['id'] ?>" class="button button--danger button--small">Excluir</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>