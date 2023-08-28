// validation restaurants

const formCreate = document.getElementById("form-create"); // Seleziona il form

if (formCreate) {
    formCreate.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const name = document.getElementById("name-create").value;
        const description = document.getElementById("description-create").value;
        const city = document.getElementById("city-create").value;
        const address = document.getElementById("address-create").value;

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.getElementById("nameError");
        const descriptionError = document.getElementById("descriptionError");
        const cityError = document.getElementById("cityError");
        const addressError = document.getElementById("addressError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        descriptionError.textContent = "";
        cityError.textContent = "";
        addressError.textContent = "";

        // Esegui le validazioni
        let isValid = true;

        if (name.trim() === "") {
            nameError.textContent = "Il campo Nome è obbligatorio ciao ciao.";
            isValid = false;
        }

        if (description.trim() === "") {
            descriptionError.textContent =
                "Il campo Descrizione è obbligatorio ciao ciao 2.";
            isValid = false;
        }

        if (city.trim() === "") {
            cityError.textContent =
                "Il campo Città è obbligatorio ciao ciao 2.";
            isValid = false;
        }

        if (city.trim() === "") {
            addressError.textContent =
                "Il campo Indirizzo è obbligatorio ciao ciao 2.";
            isValid = false;
        }

        // Aggiungi qui le altre validazioni...

        // Se tutto è valido, sottometti il form
        if (isValid) {
            formCreate.submit();
        }
    });
}
