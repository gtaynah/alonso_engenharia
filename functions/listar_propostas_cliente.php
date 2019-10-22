<?php

include('conexao.php');

$sql = "SELECT p.*, c.nm_razao_social
		FROM tb_proposta as p
		INNER JOIN tb_cliente as c ON c.cd_cliente = p.cd_cliente
		WHERE p.cd_cliente = $codigo";

$select = mysqli_query($con, $sql);

$cont = mysqli_num_rows($select);

if ($cont > 0){
	$x=0;		 
	while ($row = mysqli_fetch_assoc($select)) {
		$propostas[$x]['codigo'] = $row['cd_proposta'];
    	$propostas[$x]['cd_cliente'] = $row['cd_cliente'];
    	$propostas[$x]['endereco_obra'] = $row['endereco_obra'];
    	$propostas[$x]['valor_total'] = $row['valor_total'];
    	$propostas[$x]['sinal'] = $row['sinal'];
    	$propostas[$x]['qtd_parcelas'] = $row['qtd_parcelas'];
    	$propostas[$x]['valor_parcelas'] = $row['valor_parcelas'];
    	$propostas[$x]['valor_parcelas'] = $row['valor_parcelas'];
    	$propostas[$x]['dt_inicio_pag'] = $row['dt_inicio_pag'];
    	$propostas[$x]['dt_parcelas'] = $row['dt_parcelas'];
    	$propostas[$x]['anexo'] = $row['anexo'];
    	$propostas[$x]['status'] = $row['status'];
    	$propostas[$x]['cliente'] = $row['nm_razao_social'];
    	$x++;

	}
	
}

mysqli_close($con);



?>