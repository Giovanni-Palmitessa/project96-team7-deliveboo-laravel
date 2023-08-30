@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center text-3xl mb-2 text-secondary">MODIFICA IL TUO PRODOTTO</h1>
<div class="container mx-auto max-w-screen-xl px-2">
    <form
    method="POST"
    action="{{ route('admin.products.update', ['product' => $product]) }}"
    enctype="multipart/form-data"
    id="product_edit_form"
    >
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="product_name_edit" 
            name="name" 
            value="{{old('name', $product->name)}}">
        </div>
        <div class="mb-2 text-sm error" id="ProductNameError"></div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredienti</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="product_ingredients_edit" 
            name="ingredients" 
            value="{{old('ingredients', $product->ingredients)}}">
        </div>
        <div class="mb-2 text-sm error" id="ProductIngredientsError"></div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" 
            class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="product_price_edit" 
            name="price" 
            value="{{old('price', $product->price)}}">
        </div>
        <div class="mb-2 text-sm error" id="ProductPriceError"></div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
            name="description" 
            id="product_description_edit"
            rows="3">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-2 text-sm error" id="ProductDescriptionError"></div>


        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="url_image">Upload Image</label>
            <input id="url_image" type="file" name="url_image"  value="{{old('url_image', $product->url_image)}}" class="form-control block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" accept=".jpg, .jpeg, .png">
        </div>
        <div class="mb-2 text-sm error" id="url_imageError"></div>


    <button type="submit" class="rounded-lg bg-blue-500 hover:bg-blue-700 font-medium text-sm px-5 py-2.5 text-center text-white">Salva</button>
</form>

        
</div>

@endsection