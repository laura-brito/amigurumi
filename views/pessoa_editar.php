<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/pessoa.css">

<div class="container">
	<div class="row mb-3">
		<div class="col-lg-12 text-center">
			<h5>Cadastro de Pessoa - Editar</h5>
		</div>
	</div>

	<form method="POST" action="<?php echo BASE_URL.'pessoa/edit_action?id='.$pessoa['id']; ?>">
		<div class="row">
			<div class="col">
				<label for="nome">Nome</label>
				<input type="text" name="nome" required class="form-control" value="<?php echo $pessoa['nome']; ?>">
			</div>
			<div class="col">
				<label for="telefone">Telefone</label>
				<input type="text" name="telefone" required class="form-control" value="<?php echo $pessoa['telefone']; ?>">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="endereco">Endereço</label>
				<input type="text" name="endereco" required class="form-control" value="<?php echo $pessoa['endereco']; ?>">
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<label for="email">E-mail</label>
				<input type="email" name="email" required class="form-control" value="<?php echo $pessoa['email']; ?>">
			</div>
			<div class="col">
				<label for="senha">Senha</label>
				<input type="password" name="senha" class="form-control" value="<?php echo $pessoa['senha']; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</div>

	</form>
</div>