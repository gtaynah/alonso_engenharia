<?php

include('conexao.php');

$codigo = $_GET['cod'];
//var_dump($codigo);

$sql = "SELECT * FROM tb_usuario WHERE cd_usuario = $codigo";

$select = mysqli_query($con, $sql);

$cont = mysqli_num_rows($select);

if ($cont > 0){
	$row = mysqli_fetch_assoc($select);
	$usuario['codigo'] = $row['cd_usuario'];
	$usuario['nome'] = $row['nm_usuario'];
	$usuario['email'] = $row['ds_email'];
	$usuario['senha'] = $row['senha'];
	//var_dump($row);
}

mysqli_close($con);

?>