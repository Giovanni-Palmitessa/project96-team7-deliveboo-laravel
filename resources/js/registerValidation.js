const nome = document.getElementById("reg_name");
const email = document.getElementById("reg_email");
const password = document.getElementById("reg_password");
const passwordConferma = document.getElementById("reg_password_confirmation");

const errorNome = creaElementoErrore();
const errorEmail = creaElementoErrore();
const errorPassword = creaElementoErrore();
const errorPasswordConferma = creaElementoErrore();

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

// Aggiungi gli event listener
nome.addEventListener("input", validaNome);
email.addEventListener("input", validaEmail);
password.addEventListener("input", validaPassword);
passwordConferma.addEventListener("input", validaConfermaPassword);

function creaElementoErrore() {
    const span = document.createElement("span");
    span.classList.add("invalid-feedback");
    span.style.color = "red"; // per rendere il testo rosso
    return span;
}

function validaNome() {
    if (nome.value.length < 3) {
        mostraErrore(nome, errorNome, nomeErrori["lunghezza"]);
    } else {
        rimuoviErrore(nome, errorNome);
    }
}

function validaEmail() {
    if (!email.value.includes("@")) {
        mostraErrore(email, errorEmail, emailErrori["@"]);
    } else if (!haSuffissoValido(email.value)) {
        mostraErrore(email, errorEmail, emailErrori[".suffisso"]);
    } else if (email.value.length <= 5) {
        mostraErrore(email, errorEmail, emailErrori["lunghezza"]);
    } else {
        rimuoviErrore(email, errorEmail);
    }
}

function validaPassword() {
    if (password.value.length < 8) {
        mostraErrore(password, errorPassword, passwordErrori["lunghezza"]);
    } else {
        rimuoviErrore(password, errorPassword);
    }
}

function validaConfermaPassword() {
    if (passwordConferma.value !== password.value) {
        mostraErrore(
            passwordConferma,
            errorPasswordConferma,
            passwordConfermaErrori["nonCorrispondente"]
        );
    } else {
        rimuoviErrore(passwordConferma, errorPasswordConferma);
    }
}

function haSuffissoValido(email) {
    return email.includes(".com") || email.includes(".it");
}

function mostraErrore(elementoInput, elementoErrore, messaggio) {
    elementoErrore.innerText = messaggio;
    elementoInput.parentNode.insertBefore(
        elementoErrore,
        elementoInput.nextSibling
    );
    elementoInput.classList.add("is-invalid");
}

function rimuoviErrore(elementoInput, elementoErrore) {
    elementoErrore.innerText = "";
    elementoInput.classList.remove("is-invalid");
}
