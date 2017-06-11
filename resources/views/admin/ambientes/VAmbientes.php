<h1 class="simple-title">Ambientes</h1>
<hr>
<a href="admin/ambientes/novo" class="button button--success">Adicionar</a>
<div class="m--15"></div>
<!-- <div class="row">
	<div class="col-9">
		<input class="input h-100">
	</div>
	<div class="col-3">
		<button class="button button--primary button--block m--0">Buscar</button>
	</div>
</div> -->
<hr>
<div class="row">
	<div class="col">
		<table class="table table--striped w-100">
			<tr>
				<th>Ambiente</th>
				<th>Vísitas</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<?php foreach ($data['environments'] as $key => $environment): ?>
			<tr>
				<td style="width: 60%"><?php echo $environment->getName() ?></td>
				<td class="text--center" style="width: 20%"><?php echo $environment->getAccesses() ?></td>
				<td><a href="admin/ambientes/galeria/<?php echo $environment->getId() ?>" class="button button--primary button--small mb--0">Imagens</a></td>
				<td><a href="admin/ambientes/videos/<?php echo $environment->getId() ?>" class="button button--primary button--small mb--0">Vídeos</a></td>
				<td><a href="admin/ambientes/editar/<?php echo $environment->getId() ?>" class="button button--primary button--small mb--0">Editar</a></td>
				<td><a href="admin/ambientes/remover/<?php echo $environment->getId() ?>" class="button button--danger button--small mb--0">Excluir</a></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
