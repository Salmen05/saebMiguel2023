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
                <h5 class="mt-1">Fazer login</h5>
            </div>
            <div class="card-body">
                <form id="formLogin" name="formLogin">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginSenha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="loginSenha" name="loginSenha">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="./registrar.php" class="btn btn-warning me-1">Cadastrar</a>
                        <button type="button" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>