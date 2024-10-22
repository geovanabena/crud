<?php

include "banco.php";

$pdo = Banco::conectar();

//Protegendo contra XSS e SQL Injection
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

//Consulta otimizada buscando apenas os campos necessários
$validarLogin = $pdo->prepare("SELECT * FROM tb_alunos WHERE email = :email AND pass = :senha");
$validarLogin->bindParam(':email', $email);
$validarLogin->bindParam(':senha', $senha);
$validarLogin->execute();

if ($validarLogin->rowCount() >= 1) {

    $usuario = $validarLogin->fetch(PDO::FETCH_ASSOC);

    header('Location: index.php');
    exit();
} else {
?>
   <script>
    alert("Usuário não encontrado");
   </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    li
</head>
<body>
    
</body>
</html>