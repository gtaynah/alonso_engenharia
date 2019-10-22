<?php

include('conexao.php');


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);


$sql = "INSERT INTO `tb_usuario` VALUES (NULL, '$nome', '$email', '$senha')";

if (mysqli_query($con, $sql)) {
      echo "Usuario cadastrado com sucesso!";
      header('Location: ../lista_usuarios.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($con);

?>