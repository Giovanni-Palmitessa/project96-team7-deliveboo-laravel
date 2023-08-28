document.addEventListener("DOMContentLoaded", function () {
    // Identificare il form di login
    const loginForm = document.querySelector("#loginForm");

    if (!loginForm) return;

    // Ottieni gli elementi input all'interno del form di login
    const email = loginForm.querySelector("#log_email");
    const password = loginForm.querySelector("#log_password");

    // Assicurarsi che gli input esistano prima di proseguire
    if (!email || !password) return;

    const emailError = {
        "@": "La email deve contenere una '@'",
        ".suffisso": "La email deve contenere un prefisso '.com' o '.it'",
        lunghezza: "Inserisci un'email valida",
    };

    const passwordError = {
        lunghezza: "La password deve contenere almeno 8 caratteri",
    };

    email.addEventListener("input", validaEmail);
    password.addEventListener("input", validaPassword);

    function creaElementoErrore() {
        const span = document.createElement("span");
        span.classList.add("invalid-feedback");
        span.classList.add("errore-colore");
        return span;
    }

    function validaEmail() {
        if (!email.value.includes("@")) {
            mostraErrore(email, emailError["@"]);
        } else if (!suffissoValido(email.value)) {
            mostraErrore(email, emailError[".suffisso"]);
        } else if (email.value.length <= 5) {
            mostraErrore(email, emailError["lunghezza"]);
        } else {
            rimuoviErrore(email);
        }
    }

    function suffissoValido(emailVal) {
        return emailVal.includes(".com") || emailVal.includes(".it");
    }

    function validaPassword() {
        if (password.value.length <= 7) {
            mostraErrore(password, passwordError["lunghezza"]);
        } else {
            rimuoviErrore(password);
        }
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
