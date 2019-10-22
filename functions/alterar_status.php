<?php

include('conexao.php');
$cod = $_POST['cod'];
$status = $_POST['status'];

if($status==1){
	$status=0;
}else{
	$status=1;
}

$sql = "UPDATE tb_proposta SET status = '$status' WHERE cd_proposta = '$cod'";

if (mysqli_query($con, $sql)) {
      echo "Usuario alterado com sucesso!";
      header('Location: ../lista_propostas.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);

?>