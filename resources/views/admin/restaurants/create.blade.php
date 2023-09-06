@extends('admin.layouts.base')

@section('contents')

<div class="container mx-auto max-w-screen-xl px-2 mb-5">

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
        required>
        <div class="mb-2 text-sm text-red-600" id="nameError"></div>
      </div>

      <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrizione</label>
        <input type="text" 
        name="description" 
        id="description-create" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="{{old('description')}}" 
        required>
        <div class="mb-2 text-sm text-red-600" id="descriptionError"></div>
      </div>

      <div class="mb-6">
          <label for="city"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Città</label>
          <input type="text" 
          name="city" 
          id="city-create" 
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          value="{{old('city')}}" 
          required>
          <div class="mb-2 text-sm text-red-600" id="cityError"></div>
        </div>

        <div class="mb-6">
          <label for="address"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indirizzo</label>
          <input type="text" 
          name="address" 
          id="address-create" 
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          value="{{old('address')}}"
          required>
          <div class="mb-2 text-sm text-red-600" id="addressError"></div>
        </div>

        <div class="mb-6">
          <label for="vat"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P. IVA</label>
          <input type="tel" 
          name="vat" 
          id="vat-create" 
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
          value="{{old('vat')}}"
          required>
          <div class="mb-2 text-sm text-red-600" id="vatError"></div>
        </div>
        
        <div class="mb-6">
          <label class="block mb-2 text-sm font-medium text-gray-900" for="url_image">Immagine</label>
          <input id="url_image" type="file" name="url_image"  value="{{old('url_image')}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 ">
          <div class="mb-2 text-sm text-red-600" id="url_imageError"></div>
        </div>


        <div class="mb-6">
          <label for="priceRange" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prezzo medio</label>
          <input type="number" 
          name="priceRange" 
          id="priceRange-create" 
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          value="{{old('priceRange')}}"
          >
          <div class="mb-2 text-sm text-red-600" id="priceRangeError"></div>
        </div>

        <div class="mb-6">
          <h3 class="text-gray-900 text-sm font-medium">Categorie</h3>
              
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
                      <label for="checkbox-1" class="ml-2 text-sm font-normal text-gray-900 dark:text-gray-300">{{$category->name}}</label>
                  </div>
                  @endforeach
                  </fieldset>

                  <div class="mb-2 text-sm text-red-600" id="categoryError"></div>
        </div>

      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salva</button>
  </form>
</div>
@endsection