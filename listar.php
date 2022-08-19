<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<title>Cadastrar Filial</title>		
	</head>
	<body>
	<nav class="navbar navbar-default">
    <div class="container-fluid">
       <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
      <!-- <li><a href="dashboard.php">Home <span class="sr-only">(current)</span></a></li> -->
      <!-- <li><a href="">Cadastrar<span class="sr-only">(current)</span></a></li> -->
      <li><a href="cad_filial.php">Cadastrar</a></li>
      <li><a href="listar.php">Listar</a></li>
      <li><a href="edit_filial.php">Editar</a></li>
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ofertas do dia<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="Graduacao.html">Eletrodomésticos</a></li>
              <li><a href="Extencao.html">Informática</a></li>
              <li><a href="Pos.html">Celular</a></li>
              
            </ul>
          </li> -->
        </ul>
         <ul class="nav navbar-nav navbar-right">
          <li><a href="sair.php">Sair</a></li>
          <!-- <li><a href="#" target="_blank">Sair</a></li> -->
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meus Pedidos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Dados Pessoais</a></li>
              <li><a href="#">Endereço</a></li>
              <li><a href="#">Rastrear Pedido</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Sair</a></li>
            </ul>
          </li> -->
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
    
     <!-- CONTATO VIA WHATSAPP-->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <a href="https://wa.me/558100000000?text=Oi,%20gostaria%20de%20fazer%20minha%20Inscrição..." 
  
  style="
  position:fixed;
  width:70px;
  height:70px;
  right:30px;
  top:560px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:50px;
  box-shadow: 1px 1px 2px #888;
  z-index:1000;" 
    target="_blank">
  <i style="margin-top:10px" class="fa fa-whatsapp"></i>
  </a> -->
  
		<!-- <a href="cad_filial.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br> -->
		<!-- <a href="pesquisar.php">Pesquisar</a><br> -->
		<h1>Listar Filial</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 3;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_filial = "SELECT * FROM filial LIMIT $inicio, $qnt_result_pg";
		$resultado_filial = mysqli_query($conn, $result_filial);
		while($row_filial = mysqli_fetch_assoc($resultado_filial)){
			echo "Código: " . $row_filial['id'] . "<br>";
			echo "Nome: " . $row_filial['nome'] . "<br>";
			echo "CEP: " . $row_filial['cep'] . "<br>";
			echo "Endereço: " . $row_filial['endereco'] . "<br>";
			echo "Bairro: " . $row_filial['bairro'] . "<br>";
			echo "Cidade: " . $row_filial['cidade'] . "<br>";
			echo "UF: " . $row_filial['uf'] . "<br>";
			echo "Celular: " . $row_filial['cell'] . "<br>";
			echo "Fone Gerência: " . $row_filial['fonegerencia'] . "<br>";
			echo "Status: " . $row_filial['statusfilial'] . "<br>";

			echo "<a href='edit_filial.php?id=" . $row_filial['id'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_filial.php?id=" . $row_filial['id'] . "'>Apagar</a><br><hr>";
		}
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM filial";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>