<?php

include('conexao.php');
echo "teste";
$codigo = $_POST['codigo'];

$sql = "DELETE FROM tb_usuario WHERE cd_usuario='$codigo'";

if (mysqli_query($con, $sql)) {
      echo "Cliente alterado com sucesso!";
      header('Location: ../lista_usuarios.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>