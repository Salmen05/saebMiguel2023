<?php
require_once("./function.php");
ob_start();
if (isset($_POST['loginEmail'])) {
    $email = $_POST['loginEmail'];
    $senha = $_POST['loginSenha'];
    $select = selectLogin('idprofessor, nome, email, senha', 'tbprofessor', 'email', $email);
    if ($select->rowCount() > 0) {
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $select['senha'])) {
            $result = $select;
        } else {
            $result = 'senha';
        }
    } else {
        $result = 'email';
    }
    if (isset($result)) {
        switch ($result) {
            case 'senha':
                $data = ['success' => false, 'message' => 'Senha incorreta!', 'errorType' => 'senha'];
                break;
            case 'email':
                $data = ['success' => false, 'message' => 'Email Inválido!', 'errorType' => 'email'];
                break;
            default:
                session_start();
                $_SESSION['idprofessor'] = $select['idprofessor'];
                $_SESSION['nome'] = $select['nome'];
                $data = ['success' => true, 'message' => 'Logado com sucesso!', 'errorType' => null];
        }
    }
}
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
