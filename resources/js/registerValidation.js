const nome = document.getElementById("name");
const passwordConferma = document.getElementById("password_confirmation");

const errorNome = creaElementoErrore();
const errorPasswordConferma = creaElementoErrore();

const nomeError = {
    lunghezza: "Il nome deve contenere almeno 3 caratteri",
};

const passwordConfermaError = {
    nonCorrispondente: "Le password non corrispondono",
};

// Aggiungo gli event listener
nome.addEventListener("input", validaNome);
passwordConferma.addEventListener("input", validaConfermaPassword);

function creaElementoErrore() {
    const span = document.createElement("span");
    span.classList.add("invalid-feedback");
    span.style.color = "red"; // per rendere il testo rosso
    return span;
}

function validaNome() {
    if (nome.value.length < 3) {
        mostraErrore(nome, errorNome, nomeError["lunghezza"]);
    } else {
        rimuoviErrore(nome, errorNome);
    }
}

// function validaEmail() {
//     if (!email.value.includes("@")) {
//         mostraErrore(email, errorEmail, emailError["@"]);
//     } else if (!suffissoValido(email.value)) {
//         mostraErrore(email, errorEmail, emailError[".suffisso"]);
//     } else if (email.value.length <= 5) {
//         mostraErrore(email, errorEmail, emailError["lunghezza"]);
//     } else {
//         rimuoviErrore(email, errorEmail);
//     }
// }

// function validaPassword() {
//     if (password.value.length < 8) {
//         mostraErrore(password, errorPassword, passwordError["lunghezza"]);
//     } else {
//         rimuoviErrore(password, errorPassword);
//     }
// }

function validaConfermaPassword() {
    if (passwordConferma.value !== password.value) {
        mostraErrore(
            passwordConferma,
            errorPasswordConferma,
            passwordConfermaError["nonCorrispondente"]
        );
    } else {
        rimuoviErrore(passwordConferma, errorPasswordConferma);
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
