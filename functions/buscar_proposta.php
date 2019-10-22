<?php

include('conexao.php');

$codigo = $_GET['cod'];
//var_dump($codigo);

$sql = "SELECT * FROM tb_proposta WHERE cd_proposta = $codigo";

$select = mysqli_query($con, $sql);

$cont = mysqli_num_rows($select);

if ($cont > 0){
	$row = mysqli_fetch_assoc($select);
	$proposta['codigo'] = $row['cd_proposta'];
	$proposta['cliente'] = $row['cd_cliente'];
	$proposta['endereco_obra'] = $row['endereco_obra'];
	$proposta['valor_total'] = $row['valor_total'];
	$proposta['sinal'] = $row['sinal'];
	$proposta['qtd_parcelas'] = $row['qtd_parcelas'];
	$proposta['valor_parcelas'] = $row['valor_parcelas'];
	$proposta['dt_inicio_pag'] = $row['dt_inicio_pag'];
	$proposta['dt_parcelas'] = $row['dt_parcelas'];
	$proposta['anexo'] = $row['anexo'];
	$proposta['status'] = $row['status'];

	//var_dump($row);
}

mysqli_close($con);

?>