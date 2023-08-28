const myForm = document.getElementById("product_create_form"); // Seleziona il form

myForm.addEventListener("submit", function (event) {
    // Impedisci il comportamento di default (ricaricare la pagina)
    event.preventDefault();

    // Ottieni i valori dai campi di input
    const name = document.getElementById("product_name_create").value;
    const ingredients = document.getElementById("product_ingredients_create").value;
    const price = document.getElementById("product_price_create").value;
    // Aggiungi qui gli altri campi...

    // Ottieni le aree in cui verranno mostrati i messaggi di errore
    const nameError = document.querySelector("#ProductNameError");
    const ingredientsError = document.querySelector("#ProductIngredientsError");
    const priceError = document.querySelector("#ProductPriceError");
    // Aggiungi qui gli altri elementi per gli errori...

    // Resetta i messaggi di errore
    nameError.textContent = "";
    ingredientsError.textContent = "";
    priceError.textContent = "";
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

    // Se tutto è valido, sottometti il form
    if (isValid) {
        form.submit();
    }
});