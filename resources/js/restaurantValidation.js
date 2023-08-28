// validation restaurants

const form = document.getElementById("form-create"); // Seleziona il form

form.addEventListener("submit", function (event) {
    // Impedisci il comportamento di default (ricaricare la pagina)
    event.preventDefault();

    // Ottieni i valori dai campi di input
    const name = document.getElementById("name-create").value;
    // Aggiungi qui gli altri campi...

    // Ottieni le aree in cui verranno mostrati i messaggi di errore
    const nameError = document.getElementById("nameError");
    // Aggiungi qui gli altri elementi per gli errori...

    // Resetta i messaggi di errore
    nameError.textContent = "";
    // Aggiungi qui il reset per gli altri messaggi...

    // Esegui le validazioni
    let isValid = true;

    if (name.trim() === "") {
        nameError.textContent = "Il campo Nome è obbligatorio ciao ciao.";
        isValid = false;
    }
    // Aggiungi qui le altre validazioni...

    // Se tutto è valido, sottometti il form
    if (isValid) {
        form.submit();
    }
});
