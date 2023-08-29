// Seleziono il form
const productEditForm = document.getElementById("product_edit_form");
// Istruzione condizionale
if (productEditForm) {
    productEditForm.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const name = document.getElementById("product_name_edit").value;
        const ingredients = document.getElementById(
            "product_ingredients_edit"
        ).value;
        const price = document.getElementById("product_price_edit").value;
        const description = document.getElementById(
            "product_description_edit"
        ).value;
        // const url_image = document.getElementById("product_url_image_edit").value;

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.querySelector("#ProductNameError");
        const ingredientsError = document.querySelector(
            "#ProductIngredientsError"
        );
        const priceError = document.querySelector("#ProductPriceError");
        const descriptionError = document.querySelector(
            "#ProductDescriptionError"
        );
        // const urlImageError = document.querySelector("#ProductUrlImageError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        ingredientsError.textContent = "";
        priceError.textContent = "";
        descriptionError.textContent = "";
        // urlImageError.textContent = "";

        // Esegui le validazioni
        let isValid = true;

        if (name.trim() === "") {
            nameError.textContent = "Il campo 'Nome' è obbligatorio.";
            isValid = false;
        } else if (name.length < 2) {
            nameError.textContent =
                "Il campo 'Nome' deve contenere almeno 2 caratteri.";
            isValid = false;
        } else if (name.length > 50) {
            nameError.textContent =
                "Il campo 'Nome' può contenere al massimo 50 caratteri.";
            isValid = false;
        }

        if (ingredients.trim() === "") {
            ingredientsError.textContent =
                "Il campo 'Ingredienti' è obbligatorio.";
            isValid = false;
        } else if (ingredients.length < 10) {
            ingredientsError.textContent =
                "Il campo 'Ingredienti' deve contenere almeno 10 caratteri.";
            isValid = false;
        }

        if (price.trim() === "") {
            priceError.textContent = "Il campo 'Prezzo' è obbligatorio.";
            isValid = false;
        } else if (price <= 0) {
            priceError.textContent = "Il campo 'Prezzo' non può essere zero.";
            isValid = false;
        } else if (price > 254) {
            priceError.textContent =
                "Il campo 'Prezzo' può essere al massimo di 254.";
            isValid = false;
        }

        if (description.trim() === "") {
            descriptionError.textContent =
                "Il campo 'Descrizione' è obbligatorio.";
            isValid = false;
        } else if (description.length < 10) {
            descriptionError.textContent =
                "Il campo 'Descrizione' deve contenere almeno 10 caratteri.";
            isValid = false;
        }

        // if (url_image.trim() === "") {
        //     urlImageError.textContent = "Il campo 'Immagine' è obbligatorio.";
        //     isValid = false;
        // } else if (url_image.length < 10) {
        //     urlImageError.textContent = "Il campo 'Immagine' deve contenere almeno 10 caratteri.";
        //     isValid = false;
        // }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            productEditForm.submit();
        }
    });
}
