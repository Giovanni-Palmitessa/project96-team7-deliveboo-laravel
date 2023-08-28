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
        // Aggiungi qui gli altri campi...

        // Ottieni le aree in cui verranno mostrati i messaggi di errore
        const nameError = document.querySelector("#ProductNameError");
        const ingredientsError = document.querySelector("#ProductIngredientsError");
        const priceError = document.querySelector("#ProductPriceError");
        const descriptionError = document.querySelector("#ProductDescriptionError");
        const urlImageError = document.querySelector("#ProductUrlImageError");
        // Aggiungi qui gli altri elementi per gli errori...

        // Resetta i messaggi di errore
        nameError.textContent = "";
        ingredientsError.textContent = "";
        priceError.textContent = "";
        descriptionError.textContent = "";
        urlImageError.textContent = "";
        // Aggiungi qui il reset per gli altri messaggi...

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
            ingredientsError.textContent = "Il campo ingredienti è obbligatorio ciao a tutti"
        }

        if (price.trim() === "") {
            priceError.textContent = "Il campo prezzo è obbligatorio bella"
        } else if (price <= 0) {
            priceError.textContent = "Il prezzo deve essere maggiore di zero"
        }
        // Aggiungi qui le altre validazioni...
        if (description.trim() === "") {
            descriptionError.textContent = "Il campo descrizione è obbligatoriooo"
        } else if (description.length < 10) {
            descriptionError.textContent = "Il campo descrizione deve contenere almeno 10 caratteri"
        }

        if (url_image.trim() === "") {
            urlImageError.textContent = "Il campo Url_image è obbligatoriooo"
        } else if (url_image.length < 10) {
            urlImageError.textContent = "Il campo Url_image deve contenere almeno 10 caratteri"
        }

        // Se tutto è valido, sottometti il form
        if (isValid) {
            form.submit();
        }
    });
}