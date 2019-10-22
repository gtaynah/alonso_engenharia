<?php

include('conexao.php');

//var_dump($_POST);
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$codigo = $_POST['codigo'];
$senha_atual = $_POST['senha_atual'];

if ($senha != $senha_atual){
	$senha = md5($senha);
}

$sql = "UPDATE tb_usuario SET nm_usuario = '$nome', ds_email = '$email', senha = '$senha' WHERE cd_usuario = '$codigo'";

if (mysqli_query($con, $sql)) {
      echo "Usuario alterado com sucesso!";
      header('Location: ../lista_usuarios.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>