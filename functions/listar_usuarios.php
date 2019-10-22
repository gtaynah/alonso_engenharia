<?php

include('conexao.php');

$sql = "SELECT * FROM tb_usuario";

$select = mysqli_query($con, $sql);

$cont = mysqli_num_rows($select);

if ($cont > 0){
	$x=0;		 
	while ($row = mysqli_fetch_assoc($select)) {
		$usuarios[$x]['codigo'] = $row['cd_usuario'];
    	$usuarios[$x]['nome'] = $row['nm_usuario'];
    	$usuarios[$x]['email'] = $row['ds_email'];
    	$usuarios[$x]['senha'] = $row['senha'];
    	$x++;

	}
	
}

mysqli_close($con);

?>