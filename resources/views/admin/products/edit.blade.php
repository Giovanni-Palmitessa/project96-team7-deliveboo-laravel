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
    <div class="mb-2 text-sm" id="ProductNameError"></div>

    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <input type="text" 
        class="form-control" id="product_ingredients_edit" 
        name="ingredients" 
        value="{{old('ingredients', $product->ingredients)}}">
    </div>
    <div class="mb-2 text-sm" id="ProductIngredientsError"></div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" 
        class="form-control" id="product_price_edit" 
        name="price" 
        value="{{old('price', $product->price)}}">
    </div>
    <div class="mb-2 text-sm" id="ProductPriceError"></div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" 
        name="description" 
        id="product_description_edit"
        rows="3">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="mb-2 text-sm" id="ProductDescriptionError"></div>

    <div class="mb-3">
        <label for="url_image" class="form-label">Url Immagine</label>
        <textarea class="form-control" 
        name="url_image" 
        id="product_url_image_edit"
        rows="3">{{ old('url_image', $product->url_image) }}</textarea>
    </div>
    <div class="mb-2 text-sm" id="ProductUrlImageError"></div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection