@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center text-3xl mb-2 text-secondary">NUOVO PRODOTTO</h1>
<div class="container mx-auto max-w-screen-xl px-2">
    <form
    method="POST"
    action="{{ route('admin.products.store') }}"
    enctype="multipart/form-data"
    id="product_create_form"
    novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" id="product_name_create" 
            name="name" 
            value="{{old('name')}}"
            placeholder="Inserisci il nome del tuo prodotto">
        </div>
        <div class="mb-2 error text-sm" id="ProductNameError"></div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" id="product_ingredients_create" 
            name="ingredients" 
            value="{{old('ingredients')}}"
            placeholder="Inserisci gli ingredienti del tuo prodotto">
        </div>
        <div class="mb-2 error text-sm" id="ProductIngredientsError"></div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" id="product_price_create" 
            name="price" 
            value="{{old('price')}}"
            placeholder="Inserisci il prezzo del tuo prodotto">
        </div>
        <div class="mb-2 error text-sm" id="ProductPriceError"></div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            name="description" 
            id="product_description_create"
            rows="3"
            placeholder="Inserisci la descrizione del tuo prodotto">{{ old('description') }}</textarea>
        </div>
        <div class="mb-2 error text-sm" id="ProductDescriptionError"></div>

        <div class="mb-3">
            <label for="url_image" class="form-label">Url Immagine</label>
            <textarea class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            name="url_image" 
            id="product_url_image_create"
            rows="3"
            placeholder="Inserisci l'immagine del tuo prodotto">{{ old('url_image') }}</textarea>
        </div>
        <div class="mb-2 error text-sm" id="ProductUrlImageError"></div>

        <button class="rounded-lg bg-blue-500 hover:bg-blue-700 font-medium text-sm px-5 py-2.5 text-center text-white">Salva</button>
    </form>
</div>
@endsection