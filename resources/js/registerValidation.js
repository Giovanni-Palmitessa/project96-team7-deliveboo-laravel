document.addEventListener("DOMContentLoaded", function () {
    // Identificare il form di registrazione
    const registerForm = document.querySelector("#registerForm");

    if (!registerForm) return;

    // Ottieni gli elementi input all'interno del form di registrazione
    const nome = registerForm.querySelector("#reg_name");
    const email = registerForm.querySelector("#reg_email");
    const password = registerForm.querySelector("#reg_password");
    const passwordConferma = registerForm.querySelector(
        "#reg_password_confirmation"
    );

    // Assicurarsi che gli input esistano prima di proseguire
    if (!nome || !email || !password || !passwordConferma) return;

    const nomeErrori = {
        lunghezza: "Il nome deve contenere almeno 3 caratteri",
    };

    const emailErrori = {
        "@": "La email deve contenere una '@'",
        ".suffisso": "La email deve contenere un prefisso '.com' o '.it'",
        lunghezza: "Inserisci un'email valida",
    };

    const passwordErrori = {
        lunghezza: "La password deve contenere almeno 8 caratteri",
    };

    const passwordConfermaErrori = {
        nonCorrispondente: "Le password non corrispondono",
    };

    nome.addEventListener("input", validaNome);
    email.addEventListener("input", validaEmail);
    password.addEventListener("input", validaPassword);
    passwordConferma.addEventListener("input", validaConfermaPassword);

    function creaElementoErrore() {
        const span = document.createElement("span");
        span.classList.add("invalid-feedback");
        span.classList.add("errore-colore");
        return span;
    }

    function validaNome() {
        if (nome.value.length < 3) {
            mostraErrore(nome, nomeErrori["lunghezza"]);
        } else {
            rimuoviErrore(nome);
        }
    }

    function validaEmail() {
        if (!email.value.includes("@")) {
            mostraErrore(email, emailErrori["@"]);
        } else if (!suffissoValido(email.value)) {
            mostraErrore(email, emailErrori[".suffisso"]);
        } else if (email.value.length <= 5) {
            mostraErrore(email, emailErrori["lunghezza"]);
        } else {
            rimuoviErrore(email);
        }
    }

    function validaPassword() {
        if (password.value.length < 8) {
            mostraErrore(password, passwordErrori["lunghezza"]);
        } else {
            rimuoviErrore(password);
        }
    }

    function validaConfermaPassword() {
        if (passwordConferma.value !== password.value) {
            mostraErrore(
                passwordConferma,
                passwordConfermaErrori["nonCorrispondente"]
            );
        } else {
            rimuoviErrore(passwordConferma);
        }
    }

    function suffissoValido(emailVal) {
        return emailVal.includes(".com") || emailVal.includes(".it");
    }

    function mostraErrore(elementoInput, messaggio) {
        let errore = elementoInput.nextSibling;
        if (
            !errore.classList ||
            !errore.classList.contains("invalid-feedback")
        ) {
            errore = creaElementoErrore();
            elementoInput.after(errore);
        }
        errore.innerText = messaggio;
        elementoInput.classList.add("is-invalid");
    }

    function rimuoviErrore(elementoInput) {
        const errore = elementoInput.nextSibling;
        if (errore.classList && errore.classList.contains("invalid-feedback")) {
            errore.innerText = "";
        }
        elementoInput.classList.remove("is-invalid");
    }
});
