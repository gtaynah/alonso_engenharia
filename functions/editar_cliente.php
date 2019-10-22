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
$codigo = $_POST['codigo'];

$sql = "UPDATE tb_cliente SET nm_razao_social = '$razao_social', nm_fantasia = '$nome_fantasia', cnpj = '$cnpj', endereco = '$endereco', email = '$email', telefone = '$telefone', nm_responsavel = '$responsavel', cpf = '$cpf', celular = '$celular' WHERE cd_cliente = '$codigo'";

if (mysqli_query($con, $sql)) {
      echo "Cliente alterado com sucesso!";
      header('Location: ../lista_clientes.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>