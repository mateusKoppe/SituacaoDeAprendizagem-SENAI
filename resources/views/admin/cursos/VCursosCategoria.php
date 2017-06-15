<h1 class="simple-title">Categorias de Cursos</h1>
<hr>
<div>
	<a href="admin/ambientes" class="button button--warning">Voltar</a>
	<hr>
	<div>
		<form name="form" class="form mt--15" method="post">
			<div class="row">
				<div class="col-9">
					<input name="name" class="input h-100">
				</div>
				<div class="col-3">
					<button class="button button--success button--block m--0">Adicionar</button>
				</div>
			</div>
		</form>
	</div>
	<table class="table table--striped w-100">
		<tr>
			<th>Categoria</th>
			<th></th>
			<th></th>
		</tr>
		
		<?php foreach ($data['categories'] as $key => $category): ?>
		<tr>
			<td class="text--center" style="width: 100%">
				<?php echo $category['name'] ?>
			</td>
			<td class="text--center">
				<a href="admin/cursos/editarcategoria/<?php echo $category['id'] ?>" class="button button--primary button--small">Editar</a>
			</td>
			<td class="text--center">
				<a href="admin/cursos/excluircategoria/<?php echo $category['id'] ?>" class="button button--danger button--small">Excluir</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>