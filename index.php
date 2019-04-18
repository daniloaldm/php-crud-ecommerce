<?php
function __autoload($class_name)
{
	require_once 'classes/' . $class_name . '.php';
}
?>

<!DOCTYPE HTML>
<html land="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>crudPHP</title>
	<meta name="description" content="crudPHP" />
	<meta name="author" content="Danilo Alexandrino" />

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


	<!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/lightbox.css" rel="stylesheet" type="text/css" />

	<!-- JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/ajax.js"></script>
	<script src="js/lightbox.js"></script>
	<script language="javascript" type="text/javascript" src="js/validaForm.js"></script>
	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>

<body>

	<div class="container">

		<?php
		$produtos = new Produtos();
		if (isset($_POST['cadastrar'])) :

			$nome  = $_POST['nome'];
			$preco = $_POST['preco'];
			$descricao = $_POST['descricao'];
			$imagem = $_POST['imagem'];

			$produtos->setNome($nome);
			$produtos->setPreco($preco);
			$produtos->setDescricao($descricao);
			$produtos->setImagem($imagem);

			# Insert
			if ($produtos->insert()) {
				echo "<h2>Inserido com sucesso!</h2>";
			}
		endif;
		?>

		<header class="masthead">
			<h1 class="muted"></h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="index.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<?php
		if (isset($_POST['atualizar'])) :

			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$descricao = $_POST['descricao'];
			$imagem = $_POST['imagem'];

			$produtos->setNome($nome);
			$produtos->setPreco($preco);
			$produtos->setDescricao($descricao);
			$produtos->setImagem($imagem);

			if ($produtos->update($id)) {
				echo "<h1>Atualizado com sucesso!</h1>";
			}

		endif;
		?>

		<?php
		if (isset($_GET['acao']) && $_GET['acao'] == 'deletar') :

			$id = (int)$_GET['id'];
			if ($produtos->delete($id)) {
				echo "<h2>Deletado com sucesso!</h2>";
			}

		endif;
		?>

		<?php
		if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {

			$id = (int)$_GET['id'];
			$resultado = $produtos->find($id);
			?>

			<form name="formcad" method="post" action="">
				<div class="form-row">
					<div class="form-group col-md-2">
						<label for="inputNome">Nome do produto:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="ex:Produto" />
					</div>

					<div class="form-group col-md-2">
						<label for="inputNome">Preço:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="preco" value="<?php echo $resultado->preco; ?>" placeholder="ex:9.99" onkeyup="somenteNumeros(this);" />
					</div>


					<div class="form-group col-md-3">
						<label for="inputNome">Descrição:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="descricao" value="<?php echo $resultado->descricao; ?>" placeholder="" />
					</div>

					<div class="form-group col-md-2">
						<label for="inputNome">Imagem:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="imagem" value="<?php echo $resultado->imagem; ?>" placeholder="ex:img.png" />
					</div>
				</div>

				<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">

				<div class="form-group col-md-9">
					<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados" onclick="return validar_form()">
				</div>
			</form>

		<?php } else { ?>

			<form name='formcad' method='post' action="">
				<div class=" form-row">
					<div class="form-group col-md-2">
						<label for="inputNome">Nome do produto:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="nome" placeholder="ex:Produto" />
					</div>

					<div class="form-group col-md-2">
						<label for="inputNome">Preço:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="preco" placeholder="ex:9.99" onkeyup="somenteNumeros(this);" />
					</div>


					<div class="form-group col-md-3">
						<label for="inputNome">Descrição:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="descricao" placeholder="" />
					</div>

					<div class="form-group col-md-2">
						<label for="inputNome">Imagem:</label>
						<span class="add-on"><i class=""></i></span>
						<input type="text" name="imagem" placeholder="ex:img.png" />
					</div>
				</div>

				<div class="form-group col-md-12">
					<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados" onclick="return validar_form()">
				</div>

			</form>

		<?php } ?>

		<table id="tabela" class="table table-hover">

			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>R$:</th>
					<th>Descrição:</th>
					<th>Imagem:</th>
				</tr>
			</thead>

			<?php foreach ($produtos->findAll() as $key => $value) : ?>

				<tbody>
					<tr>
						<td><?php echo $value->id; ?></td>
						<td><?php echo $value->nome; ?></td>
						<td><?php echo $value->preco; ?></td>
						<td><?php echo $value->descricao; ?></td>
						<td id="center">
							<a href="http://localhost/crudPHP/produtos/1<?php echo $value->imagem; ?>" data-lightbox="http://localhost/crudPHP/produtos/1<?php echo $value->imagem; ?>">
								<img src="http://localhost/crudPHP/produtos/<?php echo $value->imagem; ?>" />
							</a>
						</td>

						<td>
							<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
							<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
						</td>
					</tr>
				</tbody>

			<?php endforeach; ?>

		</table>

	</div>

	<div id="lightboxOverlay" class="lightboxOverlay" style="width: 659px; height: 523px; display: none;"></div>
</body>

</html>