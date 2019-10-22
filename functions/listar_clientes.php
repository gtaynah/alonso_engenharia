<?php

include('conexao.php');

$sql = "SELECT * FROM tb_cliente ORDER BY nm_razao_social";

$select = mysqli_query($con, $sql);

$cont = mysqli_num_rows($select);

if ($cont > 0){
	$x=0;		 
	while ($row = mysqli_fetch_assoc($select)) {
		$clientes[$x]['codigo'] = $row['cd_cliente'];
    	$clientes[$x]['nome'] = $row['nm_razao_social'];
    	$clientes[$x]['fantasia'] = $row['nm_fantasia'];
    	$clientes[$x]['cnpj'] = $row['cnpj'];
    	$clientes[$x]['telefone'] = $row['telefone'];
    	$x++;

	}
	
}

mysqli_close($con);

?>