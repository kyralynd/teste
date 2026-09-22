<?php
include("../config/conexao.php");

session_start();

$login = $_POST["login"];
$senha = $_POST["senha"];

$query = "SELECT * FROM usuario WHERE (nome = '$login' OR email = '$login') AND senha = '$senha'";
$resultado = mysqli_query($conn, $query);


if(mysqli_num_rows($resultado) > 0){
    $usuario = mysqli_fetch_assoc($resultado);
    $_SESSION["nome_usuario"] = $usuario["nome"];

    header("Location: ../index.html");
    exit();
    
} else {
    
    echo "Usuário ou senha incorretos! <a href='../login.html'>Voltar</a>";
}
?>