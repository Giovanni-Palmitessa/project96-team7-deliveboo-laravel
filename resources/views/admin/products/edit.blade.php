<h1 class="text-center">Modifica il tuo Prodotto</h1>
<form
method="POST"
action="{{ route('admin.products.update', ['product' => $product]) }}"
enctype="multipart/form-data"
novalidate>
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" 
        class="form-control @error('name') is-invalid @enderror" id="name" 
        name="name" 
        value="{{old('name', $product->name)}}">
        <div class="invalid-feedback">
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <input type="text" 
        class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" 
        name="ingredients" 
        value="{{old('ingredients', $product->ingredients)}}">
        <div class="invalid-feedback">
            @error('ingredients')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" 
        class="form-control @error('price') is-invalid @enderror" id="price" 
        name="price" 
        value="{{old('price', $product->price)}}">
        <div class="invalid-feedback">
            @error('price')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error ('description') is-invalid @enderror" 
        name="description" 
        id="description"
        rows="3">{{ old('description', $product->description) }}</textarea>
        <div class="invalid-feedback">
            @error('description')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="url_image" class="form-label">Url Immagine</label>
        <textarea class="form-control @error ('url_image') is-invalid @enderror" 
        name="url_image" 
        id="url_image"
        rows="3">{{ old('url_image', $product->url_image) }}</textarea>
        <div class="invalid-feedback">
            @error('url_image')
            {{ $message }}
            @enderror
        </div>
    </div>

    <button class="btn btn-primary">Save</button>
</form>