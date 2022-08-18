<?php
session_start();
include_once("conexao.php");
$cod = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);
$result_filial = "SELECT * FROM filial WHERE cod = '$cod'";
$resultado_filial = mysqli_query($conn, $result_filial);
$row_filial = mysqli_fetch_assoc($resultado_filial);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<title>Cadastrar Filial</title>
		
		<script type="text/javascript">
  /* Máscaras*/
  function mascara(o,f){
      v_obj=o
      v_fun=f
      setTimeout("execmascara()",1)
  }
  function execmascara(){
      v_obj.value=v_fun(v_obj.value)
  }
  function mtel(v){
      v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
      v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
      v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
      return v;
  }
  function id( el ){
    return document.getElementById( el );
  }
  window.onload = function(){
    id('fone').onkeyup = function(){
      mascara( this, mtel );
    }
  }
  </script>
  
   <style>
   <!-- logo.png -->
  form {
    background:rgba(255,255,255,0.85);
    border-radius:3px;
    position:relative;
   }
   
  @media (min-width: 768px) {
   body {
   background-image: url("banner2.png");
   background-repeat:no-repeat;
   background-position:center center;
   position:relative;
  }
  
  /* form {
    background:rgba(255,255,255,0.85);
    border-radius:3px;
    width:650px;
    top:-20px;
    left:580px;
    position:relative;
   } */
   }
  </style>
  
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
		<!-- <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li> -->
		<li><a href="index.php">Home</a></li>
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

		<!-- <h1>Editar Filial</h1> -->
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<!-- <form method="POST" action="proc_edit_filial.php"> -->
			
	<div class="container">
	<form class="form-horizontal form" method="POST" name="form1" action="proc_edit_filial.php" enctype="multipart/form-data">
	<fieldset>
   
   <!-- Título do formulário -->
	<h3 style="text-align: center;">Editar Filiall</h3> 
   
   <!-- Campo: Código -->
   <div class="form-group">
	 <label class="col-md-4 control-label" for="cod">Código</label>
	 
   <div class="col-md-4">
	 <input id="cod" name="cod" placeholder="Código da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['cod']; ?>">
   </div>
   </div>
   
  <!-- Campo: Nome -->
   <div class="form-group">
	<label class="col-md-4 control-label" for="nome">Nome</label>
	
  <div class="col-md-4">
	<input id="nome" name="nome" placeholder="Nome da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['nome']; ?>">
  </div>
  </div>
  
  <!-- Campo: Endereço -->
   <div class="form-group">
	<label class="col-md-4 control-label" for="end">Endereço</label>
	
  <div class="col-md-4">
	<input id="end" name="end" placeholder="Endereço da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['endereco']; ?>">
  </div>
  </div>
  
  <!-- Campo: Bairro -->
   <div class="form-group">
	<label class="col-md-4 control-label" for="bairro">Bairro</label>
	
  <div class="col-md-4">
	<input id="bairro" name="bairro" placeholder="Bairro da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['bairro']; ?>">
  </div>
  </div>
  
  <!-- Campo: CEP -->
   <div class="form-group">
	<label class="col-md-4 control-label" for="cep">CEP</label>
	
  <div class="col-md-4">
	<input id="cep" name="cep" placeholder="CEP da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['cep']; ?>">
  </div>
  </div>
  
  <!-- Campo: Cidade -->
   <div class="form-group">
	<label class="col-md-4 control-label" for="cidade">Cidade</label>
	
  <div class="col-md-4">
	<input id="cidade" name="cidade" placeholder="Cidade da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['cidade']; ?>">
  </div>
  </div>
  
  <!-- Campo: uf -->
   <div class="form-group">
	<label class="col-md-4 control-label" for="uf">UF</label>
	
  <div class="col-md-4">
	<input id="uf" name="uf" placeholder="UF da Filial" class="form-control input-md" required="" type="text" value="<?php echo $row_filial['uf']; ?>">
  </div>
  </div>
   
	<!-- Campo: Fone class="form-control phone-ddd-mask"-->
   <div class="form-group">
	 <label class="col-md-4 control-label" for="fone">Celular</label>  
   <div class="col-md-4">
  <input id="fone" name="fone" class="form-control input-md" placeholder="Telefone Celular" required="" type="tel"maxlength="15" value="<?php echo $row_filial['cell']; ?>">
   </div>
   </div>
   
	<!-- Campo: Fone class="form-control phone-ddd-mask"-->
   <div class="form-group">
	 <label class="col-md-4 control-label" for="fone">Fone Gerência</label>  
   <div class="col-md-4">
  <input id="fone" name="fone" class="form-control input-md" placeholder="Telefone Gerência" required="" type="tel"maxlength="15" value="<?php echo $row_filial['fonegerancia']; ?>">
   </div>
   </div>

   <div class="form-group">
	 <label class="col-md-4 control-label" for="nomeg">Status</label>  
   <div class="col-md-4">
  <input id="status" name="status" class="form-control input-md" placeholder="Status" required="" value="<?php echo $row_filial['statusfilial']; ?>">
   </div>
   </div>

   <div class="form-group">
	 <label class="col-md-4 control-label" for="submit"></label>
   <div class="col-md-4">
	 <!-- <button type="submit" class="lp-pom-button-13" onclick="cadastro()" >Cadastrar</button> -->
	 <input type="submit" class="lp-pom-button-13" onclick="cadastro()" value="Editar">
   </div>
   </div>
			
<!-- <input type="submit" value="Cadastrar"> -->
<!-- <input type="submit" value="Editar"> -->
	</form>
	</body>
</html>