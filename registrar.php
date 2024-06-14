<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de turma</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/jQuery.js" defer></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/sweetAlert.js" defer></script>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 500px; margin-left: 400px; margin-top: 250px;">
            <div class="card-header text-center">
                <h5 class="mt-1">Cadastre-se gratuitamente!</h5>
            </div>
            <div class="card-body">
                <form id="formRegistro" name="formRegistro">
                    <div class="mb-3">
                        <label for="registroNome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="registroNome" name="registroNome">
                    </div>
                    <div class="mb-3">
                        <label for="registroEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="registroEmail" name="registroEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="registroSenha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="registroSenha" name="registroSenha">
                    </div>
                    <div class="mb-3">
                        <label for="confirmarSenha" class="form-label">Confirmar senha</label>
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha">
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert" style="display: none;">
                        {placeHolder}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="./index.php" class="btn btn-warning me-1">Entrar</a>
                        <button type="button" class="btn btn-primary" onclick="registrar();" id="btnRegistrar">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>