<?php
session_start();
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
if (isset($_POST['addNomeTurma'])) {
    $idprofessor = $_POST['idprofessor'];
    $nome = $_POST['addNomeTurma'];
    $data = insertTwoFields('tbturma', 'idprofessor, nome', $idprofessor, $nome);
}
if (isset($_POST['addNomeAtividade'])) {
    $idturma = $_POST['idturma'];
    $nome = $_POST['addNomeAtividade'];
    $data = insertTwoFields('tbatividade', 'idturma, nome', $idturma, $nome);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
