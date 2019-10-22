<?php

include('conexao.php');

$codigo = $_GET['cod'];
//var_dump($codigo);

$sql = "SELECT * FROM tb_cliente WHERE cd_cliente = $codigo";

$select = mysqli_query($con, $sql);

$cont = mysqli_num_rows($select);

if ($cont > 0){
	$row = mysqli_fetch_assoc($select);
	$cliente['codigo'] = $row['cd_cliente'];
	$cliente['razao_social'] = $row['nm_razao_social'];
	$cliente['nome_fantasia'] = $row['nm_fantasia'];
	$cliente['cnpj'] = $row['cnpj'];
	$cliente['endereco'] = $row['endereco'];
	$cliente['email'] = $row['email'];
	$cliente['telefone'] = $row['telefone'];
	$cliente['responsavel'] = $row['nm_responsavel'];
	$cliente['cpf'] = $row['cpf'];
	$cliente['celular'] = $row['celular'];
	//var_dump($row);
}

mysqli_close($con);

?>