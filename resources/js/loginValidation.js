const email = document.getElementById("email");
const password = document.getElementById("password");

const errorEmail = creaElementoErrore();
const errorPassword = creaElementoErrore();

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
        mostraErrore(email, errorEmail, emailError["@"]);
    } else if (!suffissoValido(email.value)) {
        mostraErrore(email, errorEmail, emailError[".suffisso"]);
    } else if (email.value.length <= 5) {
        mostraErrore(email, errorEmail, emailError["lunghezza"]);
    } else {
        rimuoviErrore(email, errorEmail);
    }
}

function suffissoValido(email) {
    return email.includes(".com") || email.includes(".it");
}

function validaPassword() {
    if (password.value.length <= 7) {
        mostraErrore(password, errorPassword, passwordError["lunghezza"]);
    } else {
        rimuoviErrore(password, errorPassword);
    }
}

function mostraErrore(elementoInput, elementoErrore, messaggio) {
    elementoErrore.innerText = messaggio;
    elementoInput.after(elementoErrore);
    elementoInput.classList.add("is-invalid");
}

function rimuoviErrore(elementoInput, elementoErrore) {
    elementoErrore.innerText = "";
    elementoInput.classList.remove("is-invalid");
}
