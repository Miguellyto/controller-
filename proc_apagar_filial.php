<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_filial = "DELETE FROM filial WHERE id='$id'";
	$resultado_filial = mysqli_query($conn, $result_filial);
	
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Filial excluída com sucesso</p>";
		header("Location: listar.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro: Filial não excluída</p>";
		header("Location: listar.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma Filial</p>";
	header("Location: listar.php");
}
