document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.querySelector("#registerForm");

    if (!registerForm) return;

    const nome = registerForm.querySelector("#reg_name");
    const email = registerForm.querySelector("#reg_email");
    const password = registerForm.querySelector("#reg_password");
    const passwordConferma = registerForm.querySelector(
        "#reg_password_confirmation"
    );

    if (!nome || !email || !password || !passwordConferma) return;

    const nomeErrori = {
        lunghezza: "Il nome deve contenere almeno 3 caratteri",
    };

    const emailErrori = {
        "@": "La email deve contenere una '@'",
        ".suffisso": "La email deve terminare con '.com' o '.it'",
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

    registerForm.addEventListener("submit", function (event) {
        if (
            !validaNome() ||
            !validaEmail() ||
            !validaPassword() ||
            !validaConfermaPassword()
        ) {
            event.preventDefault();
        }
    });

    function creaElementoErrore() {
        const span = document.createElement("span");
        span.classList.add("invalid-feedback");
        span.classList.add("text-red-500");
        return span;
    }

    function validaNome() {
        if (nome.value.length < 3) {
            mostraErrore(nome, nomeErrori["lunghezza"]);
            return false;
        } else {
            rimuoviErrore(nome);
            return true;
        }
    }

    function validaEmail() {
        if (!email.value.includes("@")) {
            mostraErrore(email, emailErrori["@"]);
            return false;
        } else if (!suffissoValido(email.value)) {
            mostraErrore(email, emailErrori[".suffisso"]);
            return false;
        } else if (email.value.length <= 5) {
            mostraErrore(email, emailErrori["lunghezza"]);
            return false;
        } else {
            rimuoviErrore(email);
            return true;
        }
    }

    function validaPassword() {
        if (password.value.length < 8) {
            mostraErrore(password, passwordErrori["lunghezza"]);
            return false;
        } else {
            rimuoviErrore(password);
            return true;
        }
    }

    function validaConfermaPassword() {
        if (passwordConferma.value !== password.value) {
            mostraErrore(
                passwordConferma,
                passwordConfermaErrori["nonCorrispondente"]
            );
            return false;
        } else {
            rimuoviErrore(passwordConferma);
            return true;
        }
    }

    function suffissoValido(emailVal) {
        return emailVal.endsWith(".com") || emailVal.endsWith(".it");
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
