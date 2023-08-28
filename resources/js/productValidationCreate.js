const productCreateForm = document.getElementById("product_create_form"); // Seleziona il form

if (productCreateForm) {
    productCreateForm.addEventListener("submit", function (event) {
        // Impedisci il comportamento di default (ricaricare la pagina)
        event.preventDefault();

        // Ottieni i valori dai campi di input
        const name = document.getElementById("product_name_create").value;
        const ingredients = document.getElementById("product_ingredients_create").value;
        const price = document.getElementById("product_price_create").value;
        const description = document.getElementById("product_description_create").value;
        const url_image = document.getElementById("product_url_image_create").value;

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.querySelector("#ProductNameError");
        const ingredientsError = document.querySelector("#ProductIngredientsError");
        const priceError = document.querySelector("#ProductPriceError");
        const descriptionError = document.querySelector("#ProductDescriptionError");
        const urlImageError = document.querySelector("#ProductUrlImageError");

        // Resetta i messaggi di errore
        nameError.textContent = "";
        ingredientsError.textContent = "";
        priceError.textContent = "";
        descriptionError.textContent = "";
        urlImageError.textContent = "";

        // Esegui le validazioni
        let isValid = true;

        if (name.trim() === "") {
            nameError.textContent = "Il campo Nome è obbligatorio ciao ciao.";
            isValid = false;
        } else if (name.length < 2) {
            nameError.textContent = "Il campo Nome è troppo corto ciao ciao.";
            isValid = false;
        } else if (name.length > 50) {
            nameError.textContent = "Il campo Nome è troppo lungo ciao ciao.";
            isValid = false;
        }

        if (ingredients.trim() === "") {
            ingredientsError.textContent = "Il campo Ingredienti è obbligatorio ciao a tutti";
            isValid = false;
        } else if (ingredients.length < 10) {
            ingredientsError.textContent = "Il campo Ingredienti deve contenere almeno 10 caratteri";
            isValid = false;
        }

        if (price.trim() === "") {
            priceError.textContent = "Il campo prezzo è obbligatorio bella";
            isValid = false;
        } else if (price <= 0) {
            priceError.textContent = "Il prezzo deve essere maggiore di zero";
            isValid = false;
        }

        if (description.trim() === "") {
            descriptionError.textContent = "Il campo descrizione è obbligatoriooo";
            isValid = false;
        } else if (description.length < 10) {
            descriptionError.textContent = "Il campo descrizione deve contenere almeno 10 caratteri"
            isValid = false;
        }

        if (url_image.trim() === "") {
            urlImageError.textContent = "Il campo Url_image è obbligatoriooo";
            isValid = false;
        } else if (url_image.length < 10) {
            urlImageError.textContent = "Il campo Url_image deve contenere almeno 10 caratteri";
            isValid = false;
        }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            productCreateForm.submit();
        }
    });
}