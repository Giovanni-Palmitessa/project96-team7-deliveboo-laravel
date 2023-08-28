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
        const vat = document.getElementById("vat-create").value;

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.getElementById("nameError");
        const descriptionError = document.getElementById("descriptionError");
        const cityError = document.getElementById("cityError");
        const addressError = document.getElementById("addressError");
        const vatError = document.getElementById("vatError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        descriptionError.textContent = "";
        cityError.textContent = "";
        addressError.textContent = "";
        vatError.textContent = "";

        // Esegui le validazioni
        let isValid = true;

        if (name.trim() === "") {
            nameError.textContent = "Il campo Nome è obbligatorio ciao ciao.";
            isValid = false;
        } else if (name.length > 50) {
            nameError.textContent =
                "Il campo Nome non può contenere più di 50 caratteri.";
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
        } else if (city.length > 30) {
            cityError.textContent =
                "Il campo Città non può contenere più di 30 caratteri.";
            isValid = false;
        }

        if (address.trim() === "") {
            addressError.textContent =
                "Il campo Indirizzo è obbligatorio ciao ciao 2.";
            isValid = false;
        } else if (address.length > 30) {
            addressError.textContent =
                "Il campo Indirizzo non può contenere più di 50 caratteri.";
            isValid = false;
        }

        if (vat.trim() === "") {
            addressError.textContent =
                "Il campo P.IVA è obbligatorio ciao ciao 2.";
            isValid = false;
        } else if (!/^\d{10}$/.test(vat)) {
            vatError.textContent =
                "Inserisci una P.IVA valida composta da 10 cifre.";
            isValid = false;
        }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            formCreate.submit();
        }
    });
}
