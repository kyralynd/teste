<?php
include("../config/conexao.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$result_usua = "INSERT INTO usuario(nome, email, senha)
VALUES ('$nome', '$email', '$senha')";

$resultado_usua = mysqli_query($conn, $result_usua);

if(mysqli_affected_rows($conn) != 0){

header("Location: ../login.html");
exit();
    
} else {
echo "Erro ao cadastrar";
}

?>

