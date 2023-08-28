// validation restaurants per create

const formCreate = document.getElementById("form-create"); // Seleziona il form
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

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
        const categoryError = document.getElementById("categoryError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        descriptionError.textContent = "";
        cityError.textContent = "";
        addressError.textContent = "";
        vatError.textContent = "";

        // Esegui le validazioni
        let isValid = true;
        let isAnyCheckboxChecked = false;

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
            vatError.textContent = "Il campo P.IVA è obbligatorio ciao ciao 2.";
            isValid = false;
        } else if (!/^\d{10}$/.test(vat)) {
            vatError.textContent =
                "Inserisci una P.IVA valida composta da 10 cifre.";
            isValid = false;
        }

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                isAnyCheckboxChecked = true;
            }
        });

        if (!isAnyCheckboxChecked) {
            event.preventDefault();
            categoryError.textContent = "Seleziona almeno una categoria.";
        } else {
            categoryError.textContent = ""; // Rimuovi il messaggio di errore se almeno un checkbox è selezionato
        }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            formCreate.submit();
        }
    });
}

// validation restaurants per edit

const formEdit = document.getElementById("form-edit"); // Seleziona il form
const checkboxesEdit = document.querySelectorAll('input[type="checkbox"]'); //seleziona le checkbox

if (formEdit) {
    formEdit.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const nameEdit = document.getElementById("name-edit").value;
        const descriptionEdit =
            document.getElementById("description-edit").value;
        const cityEdit = document.getElementById("city-edit").value;
        const addressEdit = document.getElementById("address-edit").value;
        const vatEdit = document.getElementById("vat-edit").value;

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameErrorEdit = document.getElementById("nameErrorEdit");
        const descriptionErrorEdit = document.getElementById(
            "descriptionErrorEdit"
        );
        const cityErrorEdit = document.getElementById("cityErrorEdit");
        const addressErrorEdit = document.getElementById("addressErrorEdit");
        const vatErrorEdit = document.getElementById("vatErrorEdit");
        const categoryErrorEdit = document.getElementById("categoryErrorEdit");

        // Resetta i messaggi di errore
        nameErrorEdit.textContent = "";
        descriptionErrorEdit.textContent = "";
        cityErrorEdit.textContent = "";
        addressErrorEdit.textContent = "";
        vatErrorEdit.textContent = "";

        // Esegui le validazioni
        let isValidEdit = true;
        let isAnyCheckboxCheckedEdit = false;

        if (nameEdit.trim() === "") {
            nameErrorEdit.textContent =
                "Il campo Nome è obbligatorio ciao ciao.";
            isValidEdit = false;
        } else if (nameEdit.length > 50) {
            nameErrorEdit.textContent =
                "Il campo Nome non può contenere più di 50 caratteri.";
            isValidEdit = false;
        }

        if (descriptionEdit.trim() === "") {
            descriptionErrorEdit.textContent =
                "Il campo Descrizione è obbligatorio ciao ciao 2.";
            isValidEdit = false;
        }

        if (cityEdit.trim() === "") {
            cityErrorEdit.textContent =
                "Il campo Città è obbligatorio ciao ciao 2.";
            isValidEdit = false;
        } else if (cityEdit.length > 30) {
            cityErrorEdit.textContent =
                "Il campo Città non può contenere più di 30 caratteri.";
            isValidEdit = false;
        }

        if (addressEdit.trim() === "") {
            addressErrorEdit.textContent =
                "Il campo Indirizzo è obbligatorio ciao ciao 2.";
            isValidEdit = false;
        } else if (addressEdit.length > 30) {
            addressErrorEdit.textContent =
                "Il campo Indirizzo non può contenere più di 50 caratteri.";
            isValidEdit = false;
        }

        if (vatEdit.trim() === "") {
            vatErrorEdit.textContent =
                "Il campo P.IVA è obbligatorio ciao ciao 2.";
            isValidEdit = false;
        } else if (!/^\d{10}$/.test(vatEdit)) {
            vatErrorEdit.textContent =
                "Inserisci una P.IVA valida composta da 10 cifre.";
            isValidEdit = false;
        }

        checkboxesEdit.forEach((checkboxEdit) => {
            if (checkboxEdit.checked) {
                isAnyCheckboxCheckedEdit = true;
            }
        });

        if (!isAnyCheckboxCheckedEdit) {
            event.preventDefault();
            categoryErrorEdit.textContent = "Seleziona almeno una categoria.";
        } else {
            categoryErrorEdit.textContent = ""; // Rimuovi il messaggio di errore se almeno un checkbox è selezionato
        }

        // Se tutto è valido, sottometti il form
        if (isValidEdit) {
            formEdit.submit();
        }
    });
}
