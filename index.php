<?php
	function __autoload($class_name){
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
	<meta name="author" content="Danilo Alexandrino"/>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" />
	
	<script type="text/javascript">
		function validar_form(){
			var nome = formcad.nome.value;
			var preco = formcad.preco.value;
			var descricao = formcad.descricao.value;
			var imagem = formcad.imagem.value;


			if(nome == "" || preco == "" || descricao == "" || imagem == ""){
				alert("Verifique se todos os campos foram preenchidos!");
				return false;
			}

			//continuar validações

		}

		function somenteNumeros(num) {
			var er = /[^0-9.]/;
			er.lastIndex = 0;
			var campo = num;
			if (er.test(campo.value)) {
			campo.value = "";
			}
    	}
		
	</script>

</head>
<body>

	<div class="container">

		<?php
	
		$tarefas = new Tarefas(); 

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$preco = $_POST['preco'];
			$descricao = $_POST['descricao'];
			$imagem = $_POST['imagem'];

			
			$tarefas->setNome($nome);
			$tarefas->setPreco($preco);
			$tarefas->setDescricao($descricao);
			$tarefas->setImagem($imagem);

			# Insert
			if($tarefas->insert()){
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
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$descricao = $_POST['descricao'];
			$imagem= $_POST['imagem'];

			$tarefas->setNome($nome);
			$tarefas->setPreco($preco);
			$tarefas->setDescricao($descricao);
			$tarefas->setImagem($imagem);

			if($tarefas->update($id)){
				echo "<h1>Atualizado com sucesso!</h1>";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($tarefas->delete($id)){
				echo "<h2>Deletado com sucesso!</h2>";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $tarefas->find($id);
		?>

		<form name="formcad" method="post" action="">
			Nome:
			<div class="col-2">
				<div class="input-prepend">
					<span class="add-on"><i class=""></i></span>
					<input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
				</div>
			</div>

			Preço:
			<div class="col-2">
				<div class="input-prepend">
					<span class="add-on"><i class=""></i></span>
					<input type="text" name="preco" value="<?php echo $resultado->preco; ?>" placeholder="Digite apenas números!" onkeyup="somenteNumeros(this);" />
				</div>
			</div>

			Descrição:
			<div class="col-2">
				<div class="input-prepend">
					<span class="add-on"><i class=""></i></span>
					<input type="text" name="descricao" value="<?php echo $resultado->descricao; ?>" placeholder="Descrição:" />
				</div>
			</div>

			Imagem:
			<div class="col-2">
				<div class="input-prepend">
					<div class="input-prepend">
						<input type="file" name="imagem" placeholder="Imagem:" />
					</div>
				</div>
			</div>
			
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
			<br />
			<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados" onclick="return validar_form()>					
		</form>


		<?php }else{ ?>


		<form name="formcad" method="post" action="">
				
			Nome:
			<div class="col-2">
				<div class="input-prepend">
				<span class="add-on"><i class=""></i></span>
					<input type="text" name="nome" placeholder="ex:Produto" />
				</div>
			</div>

			Preço:
			<div class="col-2">
				<div class="input-prepend">
					<span class="add-on"><i class=""></i></span>
					<input type="text" name="preco" placeholder="ex:9.99" onkeyup="somenteNumeros(this);" />
				</div>
			</div>

			Descrição:
			<div class="col-2">
				<div class="input-prepend">
					<span class="add-on"><i class=""></i></span>
					<input type="text" name="descricao" placeholder="" />
				</div>
			</div>

			Imagem:
			<div class="col-2">
				<div class="input-prepend">
						<input type="file" name="imagem" placeholder="" />
				</div>
			</div>
			
			<br />
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados" onclick="return validar_form()">					
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>R$:</th>
					<th>Descrição:</th>
					<th>Imagem:</th>
				</tr>
			</thead>
			
			<?php foreach($tarefas->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->preco; ?></td>
					<td><?php echo $value->descricao; ?></td>
					<td><?php echo $value->imagem; ?></td>
					<td>
						<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
						<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

	</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>



</body>
</html>