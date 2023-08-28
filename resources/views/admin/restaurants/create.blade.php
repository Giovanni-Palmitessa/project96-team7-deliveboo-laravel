@extends('admin.layouts.base')

@section('contents')
<form method="POST" 
action="{{ route('admin.restaurants.store') }}" 
enctype="multipart/form-data" 
id="form-create"
novalidate 
>

@csrf

    <div class="mb-6">
      <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
      <input type="text" 
      id="name-create" 
      name="name" 
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      value="{{old('name')}}" 
      @error('name') is-invalid @enderror
      required>
      @error('name')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
      @enderror
      <div class="mb-2 text-sm text-red-600" id="nameError"></div>
    </div>

    <div class="mb-6">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrizione</label>
      <input type="text" 
      name="description" 
      id="description-create" 
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
      value="{{old('description')}}" 
      @error('description') is-invalid @enderror
      required>
      @error('description')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
      @enderror
      <div class="mb-2 text-sm text-red-600" id="descriptionError"></div>
    </div>

    <div class="mb-6">
        <label for="city"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Città</label>
        <input type="text" 
        name="city" 
        id="city-create" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="{{old('city')}}" 
        @error('city') is-invalid @enderror
        required>
        @error('description')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
        @enderror
        <div class="mb-2 text-sm text-red-600" id="cityError"></div>
      </div>

      <div class="mb-6">
        <label for="address"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indirizzo</label>
        <input type="text" 
        name="address" 
        id="address-create" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="{{old('address')}}"
        @error('address') is-invalid @enderror
        required>
        @error('address')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
        @enderror
        <div class="mb-2 text-sm text-red-600" id="addressError"></div>
      </div>

      <div class="mb-6">
        <label for="vat"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P. IVA</label>
        <input type="tel" 
        name="vat" 
        id="vat-create" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="{{old('vat')}}"
        @error('vat') is-invalid @enderror
        required>
        @error('vat')
                <div class="invalid-feedback">
                    {{ $message }} 
                </div>
        @enderror
        <div class="mb-2 text-sm text-red-600" id="vatError"></div>
      </div>

      <div class="mb-6">
        <label for="url_image"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Immagine</label>
        <input type="text" 
        name="url_image" 
        id="url_image-create" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{old('url_image')}}"
        >
      </div>

      <div class="mb-6">
        <label for="priceRange" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prezzo medio</label>
        <input type="number" 
        name="priceRange" 
        id="priceRange-create" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        value="{{old('priceRange')}}"
        >
      </div>

      <div class="mb-6">
        <h3>Categorie</h3>
            
            <fieldset>
                @foreach ($categories as $category)            
                <div class="flex items-center mb-4">
                    <input id="category-{{$category->id}}" 
                    type="checkbox" 
                    value="{{$category->id}}"               
                    name="categories[]" 
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  
                    @if (in_array($category->id, old('categories', [])))
                    checked  
                    @endif
                    >
                    <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$category->name}}</label>
                </div>
                @endforeach

                </fieldset>
      </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>

  {{-- @push('scripts')
        <script src="{{ asset('js/restaurantValidation.js') }}"></script>
  @endpush --}}

@endsection