@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center">Modifica il tuo Prodotto</h1>
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
        class="form-control" id="product_name_edit" 
        name="name" 
        value="{{old('name', $product->name)}}">
    </div>
    <div class="mb-2 text-sm error" id="ProductNameError"></div>

    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <input type="text" 
        class="form-control" id="product_ingredients_edit" 
        name="ingredients" 
        value="{{old('ingredients', $product->ingredients)}}">
    </div>
    <div class="mb-2 text-sm error" id="ProductIngredientsError"></div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" 
        class="form-control" id="product_price_edit" 
        name="price" 
        value="{{old('price', $product->price)}}">
    </div>
    <div class="mb-2 text-sm error" id="ProductPriceError"></div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" 
        name="description" 
        id="product_description_edit"
        rows="3">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="mb-2 text-sm error" id="ProductDescriptionError"></div>

    <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="url_image">Upload Image</label>
        <input id="product_url_image_edit" type="file" name="url_image"  value="{{old('url_image', $product->url_image)}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 ">
    </div>
    <div class="mb-2 text-sm error" id="ProductUrlImageError"></div>

    
    {{-- <div class="flex items-center mb-6">
        <input id="default-checkbox" name="visible" type="checkbox" value="{{old('visible', $product->visible)}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Prodotto disponibile?</label>
    </div> --}}
    

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection