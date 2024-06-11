<?php
require_once("./function.php");
ob_start();
if (isset($_POST['registroNome'])) {
    $options = ['cost' => 12];
    $nome = $_POST['registroNome'];
    $email = $_POST['registroEmail'];
    $senha = $_POST['registroSenha'];
    $senha = password_hash($senha, PASSWORD_BCRYPT, $options);
    $data = insertThreeFields('tbprofessor', 'nome, email, senha', $nome, $email, $senha);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
