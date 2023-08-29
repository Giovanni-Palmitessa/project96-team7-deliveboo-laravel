@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center">Inserisci un nuovo Prodotto</h1>
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
        class="form-control" id="product_name_create" 
        name="name" 
        value="{{old('name')}}">
    </div>
    <div class="mb-2 error text-sm" id="ProductNameError"></div>

    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <input type="text" 
        class="form-control" id="product_ingredients_create" 
        name="ingredients" 
        value="{{old('ingredients')}}">
    </div>
    <div class="mb-2 error text-sm" id="ProductIngredientsError"></div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number" 
        class="form-control" id="product_price_create" 
        name="price" 
        value="{{old('price')}}">
    </div>
    <div class="mb-2 error text-sm" id="ProductPriceError"></div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" 
        name="description" 
        id="product_description_create"
        rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="mb-2 error text-sm" id="ProductDescriptionError"></div>

    <div class="mb-3">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="url_image">Upload Image</label>
        <input id="url_image" type="file" name="url_image"  value="{{old('url_image')}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 ">
      </div>

    <button class="btn btn-primary">Save</button>
</form>
@endsection