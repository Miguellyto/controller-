<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);
if(!empty($cod)){
	$result_filial = "DELETE FROM filial WHERE cod='$cod'";
	$resultado_filial = mysqli_query($conn, $result_filial);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Filial excluída com sucesso</p>";
		header("Location: index.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro: Filial não excluída</p>";
		header("Location: index.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma Filial</p>";
	header("Location: index.php");
}
