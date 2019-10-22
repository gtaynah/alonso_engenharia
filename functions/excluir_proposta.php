<?php

include('conexao.php');
$codigo = $_POST['codigo'];

$sql = "DELETE FROM tb_proposta WHERE cd_proposta='$codigo'";

if (mysqli_query($con, $sql)) {
      echo "Cliente alterado com sucesso!";
      header('Location: ../lista_propostas.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>