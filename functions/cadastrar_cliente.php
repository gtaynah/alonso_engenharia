<?php

include('conexao.php');

//var_dump($_POST);
$razao_social = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$cnpj = $_POST['cnpj'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$responsavel = $_POST['responsavel'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];


$sql = "INSERT INTO `tb_cliente` (`cd_cliente`, `nm_razao_social`, `nm_fantasia`, `cnpj`, `endereco`, `email`, `telefone`, `nm_responsavel`, `cpf`, `celular`) VALUES (NULL, '$razao_social', '$nome_fantasia', '$cnpj', '$endereco', '$email', '$telefone', '$responsavel', '$cpf', '$celular')";

if (mysqli_query($con, $sql)) {
      echo "Cliente cadastrado com sucesso!";
      header('Location: ../lista_clientes.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($con);

?>