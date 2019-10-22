<?php

include('conexao.php');

var_dump($_POST);
$cliente = $_POST['cliente'];
$endereco_obra = $_POST['endereco_obra'];
$valor_total = $_POST['valor_total'];
$sinal = $_POST['sinal'];
$qtde_parcelas = $_POST['qtde_parcelas'];
$valor_parcelas = $_POST['valor_parcelas'];
$dt_inicio_pag = $_POST['dt_inicio_pag'];
$dt_parcelas = $_POST['dt_parcelas'];
$status = $_POST['status'];

//Upload do arquivo
if(isset($_FILES['anexo'])){
	date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

	$ext = strtolower(substr($_FILES['anexo']['name'],-4)); //Pegando extensão do arquivo
	$arquivo = $cliente."-".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
	$dir = '../assets/uploads/'; //Diretório para uploads

	move_uploaded_file($_FILES['anexo']['tmp_name'], $dir.$arquivo); //Fazer upload do arquivo
}else {
	$arquivo="";
}


$sql = "INSERT INTO tb_proposta VALUES (NULL, '$cliente', '$endereco_obra', '$valor_total', '$sinal', '$qtde_parcelas', '$valor_parcelas', '$dt_inicio_pag', '$dt_parcelas', '$arquivo', '$status')";

if (mysqli_query($con, $sql)) {
      echo "Cliente cadastrado com sucesso!";
      header('Location: ../lista_propostas.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>