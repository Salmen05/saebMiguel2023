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
    const btnRegistrar = document.querySelector("#btnRegistrar");
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
        btnRegistrar.disabled = true;
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
                console.log(data);
                formRegistro.reset();
                if (data.success) {
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Você já pode fazer login na tela inicial.",
                        icon: "success",
                    });
                    setTimeout(function () {
                        location.href = "./index.php";
                    }, 1500)
                } else {
                    Swal.fire({
                        title: "Oops!",
                        text: "Não foi possível registrar.",
                        icon: "error",
                    });
                    btn.disabled = false;
                }
            })
    }
}
function addTurma() {
    const modalAddTurma = new bootstrap.Modal(document.querySelector("#modalAddTurma"));
    const btnAdd = document.querySelector("#btnAdd");
    modalAddTurma.show();
    btnAdd.addEventListener("click", function () {
        const formAddTurma = document.querySelector("#formAddTurma");
        const inpAddNomeTurma = document.querySelector("#addNomeTurma").value;
        const alert = document.querySelector("#alert");
        if (inpAddNomeTurma.length < 6) {
            alert.style.display = 'block';
        } else {
            btnAdd.disabled = true;
            alert.style.display = 'none';
            const formData = new FormData(formAddTurma);
            const url = "./insert.php";
            fetch(url, {
                headers: {
                    'Accept': 'application/json'
                },
                body: formData,
                method: 'POST'
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        Swal.fire({
                            title: "Sucesso!",
                            text: "Você já pode verificar a turma na tabela.",
                            icon: "success",
                        });
                        formAddTurma.reset();
                        btnAdd.disabled = false;
                        modalAddTurma.hide();
                        carregarConteudo('turma');
                    } else {
                        Swal.fire({
                            title: "Oops!",
                            text: "Não foi possível adicionar a turma.",
                            icon: "error",
                        });
                        formAddTurma.reset();
                        modal.disabled = false;
                        modalAddTurma.hide();
                    };
                });
        }
    })
}
function addAtividade(){
    
}
function deletarTurma(idturma) {
    const modalDelete = new bootstrap.Modal(document.querySelector("#modalDelete"));
    const bodyModalDelete = document.querySelector("#bodyModalDelete");
    const btnModalDeletar = document.querySelector("#btnModalDeletar");
    modalDelete.show();
    bodyModalDelete.innerHTML = `Tem certeza que deseja deletar a turma de número ${idturma}?`
    btnModalDeletar.addEventListener("click", function () {
        const formData = new FormData();
        formData.append("idturma", idturma)
        const url = "./deletar.php";
        fetch(url, {
            headers: {
                'Accept': 'application/json'
            },
            body: formData,
            method: 'POST'
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                Swal.fire({
                    title: "Sucesso!",
                    text: "Turma deletada com sucesso.",
                    icon: "success",
                });
                modalDelete.hide();
                carregarConteudo('turma');
            })
            .catch(error => {
                Swal.fire({
                    title: "Oops!",
                    text: "Ainda existem atividades para a turma realizar.",
                    icon: "error",
                });
                modalDelete.hide();
                carregarConteudo('turma');
            })
    })
}
function visualizarTurma(idturma) {
    const url = "./ponteAtividade.php";
    const formData = new FormData();
    formData.append("idturma", idturma);
    fetch(url, {
        headers: {
            'Accept': 'application/json'
        },
        body: formData,
        method: 'POST'
    })
        .then(response => response.text())
        .then(data => {
            document.querySelector("#conteudo").innerHTML = data
        })
}
function carregarConteudo(page) {
    const url = "./controle.php";
    const formData = new FormData();
    formData.append("page", page)
    fetch(url, {
        headers: {
            'Accept': 'application/json'
        },
        body: formData,
        method: 'POST'
    })
        .then(response => response.text())
        .then(data => { document.querySelector("#conteudo").innerHTML = data })
        .catch(error => console.error('Erro na requisição: ', error));
}
window.onload = function () {
    carregarConteudo('turma');
}
