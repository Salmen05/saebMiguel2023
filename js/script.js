function logar() {
    const formLogin = document.querySelector("#formLogin");
    const alert = document.querySelector("#alert");
    const btnLogin = document.querySelector("#btnLogin");
    const loginEmail = document.querySelector("#loginEmail").value;
    const loginSenha = document.querySelector("#loginSenha").value;
    btnLogin.disabled = true;
    if (loginEmail.length == 0) {
        alert.style.display = "block";
        alert.innerHTML = "O campo de email está vazio!";
    } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(loginEmail)) {
        alert.style.display = "block";
        alert.innerHTML = "Por favor, insira um email válido!";
    } else if (loginSenha.length == 0) {
        alert.style.display = "block";
        alert.innerHTML = "O campo de senha está vazio!";
    } else if (loginSenha.length < 6) {
        alert.style.display = "block";
        alert.innerHTML = "A senha deve conter pelo menos 6 caracteres!";
    } else {
        alert.style.display = "hidden";
        const formData = new FormData(formLogin);
        const url = "./validar.php";
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Logado com sucesso.",
                        icon: "success",
                    });
                    setTimeout(function () {
                        window.location.href = "./dashboard.php";
                    }, 2000)
                } else if (data.errorType == 'email') {
                    Swal.fire({
                        title: "Oops!",
                        text: "Email não encontrado em nosso banco.",
                        icon: "error",
                    });
                    formLogin.reset();
                    btnLogin.disabled = false;
                } else {
                    Swal.fire({
                        title: "Oops!",
                        text: "A senha não confere com a deste professor!",
                        icon: "error",
                    });
                    formLogin.reset();
                    btnLogin.disabled = false;
                }
            })
    }
}

function registrar() {
    const formRegistro = document.querySelector("#formRegistro");
    const alert = document.querySelector("#alert");
    const registroNome = document.querySelector("#registroNome").value;
    const registroEmail = document.querySelector("#registroEmail").value;
    const registroSenha = document.querySelector("#registroSenha").value;
    const confirmarSenha = document.querySelector("#confirmarSenha").value;
    if (registroNome.length == 0) {
        alert.style.display = "block";
        alert.innerHTML = "O campo de nome está vazio!";
    } else if (registroEmail.length == 0) {
        alert.style.display = "block";
        alert.innerHTML = "O campo de email está vazio!";
    } else if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(registroEmail)) {
        alert.style.display = "block";
        alert.innerHTML = "Por favor, insira um email válido!";
    } else if (registroSenha.length == 0) {
        alert.style.display = "block";
        alert.innerHTML = "O campo de senha está vazio!";
    } else if (registroSenha.length < 6) {
        alert.style.display = "block";
        alert.innerHTML = "A senha deve conter pelo menos 6 caracteres!";
    } else if (confirmarSenha != registroSenha) {
        alert.style.display = "block";
        alert.innerHTML = "As senhas não conferem!";
    } else {
        alert.style.display = "none";
        const formData = new FormData(formRegistro);
        const url = "./insert.php";
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data);
                    alert.style.display = "block";
                    alert.innerHTML = "Deu certo!";
                    alert.classList.remove("alert-warning");
                    alert.classList.add("alert-success");
                } else {
                    console.log(data)
                }
            })
    }
}
function carregarConteudo(page) {
    const url = "./controle.php";
    fetch(url, {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `page=${encodeURIComponent(page)}`,
        method: 'POST'
    })
        .then(response => response.text())
        .then(data => { document.querySelector("#conteudo").innerHTML = data })
        .catch(error => console.error('Erro na requisição: ', error));
}
window.onload = function () {
    carregarConteudo('turma');
}