<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$cell = filter_input(INPUT_POST, 'cell', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$fonegerancia = filter_input(INPUT_POST, 'fonegerencia', FILTER_SANITIZE_STRING);
$statusfilial = filter_input(INPUT_POST, 'statusfilial', FILTER_SANITIZE_STRING);

$result_filial = "UPDATE filial SET id='$id', nome='$nome', endereco='$endereco', bairro='$bairro', cep='$cep', cidade'$cidade', uf='$uf', cell='$cell', fonegerencia='$fonegerancia', statusfilial='$statusfilial', modified=NOW() WHERE id='$id'";
$resultado_filial = mysqli_query($conn, $result_filial);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Filial editada com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Registro não editado</p>";
	header("Location: editar.php?id=$id");
}
