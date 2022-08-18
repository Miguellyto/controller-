<?php
session_start();
include_once("conexao.php");

$cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$cell = filter_input(INPUT_POST, 'cell', FILTER_SANITIZE_NUMBER_INT);
$fonegerancia = filter_input(INPUT_POST, 'fonegerancia', FILTER_SANITIZE_NUMBER_INT);
$statusfilial = filter_input(INPUT_POST, 'statusfilial', FILTER_SANITIZE_STRING);

$result_filial = "UPDATE filial SET cod='$cod', nome='$nome', endereco='$endereco', bairro='$bairro', cep='$cep', cidade'$cidade', uf='$uf', cell='$cell', fonegerancia='$fonegerancia', statusfilial='$statusfilial', modified=NOW() WHERE cod='$cod'";
$resultado_filial = mysqli_query($conn, $result_filial);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Filial editada com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Registro não editado</p>";
	header("Location: editar.php?cod=$cod");
}
