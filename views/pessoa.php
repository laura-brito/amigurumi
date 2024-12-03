<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/pessoa.css">

<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h5>Cadastro de Pessoa</h5>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo BASE_URL; ?>pessoa/adicionar" class='btn btn-success'>Cadastrar</a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Endereço</th>
						<th>E-mail</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($pessoa as $item): ?>
						<tr>
							<td><?php echo $item['nome']; ?></td>
							<td><?php echo $item['telefone']; ?></td>
							<td><?php echo $item['endereco']; ?></td>
							<td><?php echo $item['email']; ?></td>
							<td>
								<a href="<?php echo BASE_URL.'pessoa/editar?id='.$item['id']; ?>" class="btn btn-warning">Editar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>