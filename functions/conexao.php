<?php
$con = mysqli_connect("localhost", "root", "", "alonso_engenharia");

// Checa conexão
if (mysqli_connect_errno()) {
   echo "Falha na conexão com o servido MySQL:  " . mysqli_connect_error();
} 
?>