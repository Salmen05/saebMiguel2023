function logar() {

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