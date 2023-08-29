@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center text-3xl mb-2">{{ $product->name}}</h1>
<div class="container mx-auto max-w-screen-xl">
    <div>
        <img src="{{ $product->url_image }}" alt="{{ $product->name }}">
    </div>
    <p>{{ $product->description }}</p>
    <div class="flex gap-2">
        <span class="font-semibold">Ingredienti:</span>
        <p>{{ $product->ingredients }}</p>
    </div>
    <div class="flex gap-2">
        <span class="font-semibold">Prezzo:</span>
        <p>{{ $product->price }}</p>
    </div>
    <div class="mx-auto flex justify-center gap-2">
        <button class="rounded-lg bg-yellow-300 hover:bg-yellow-500 font-medium text-sm px-5 py-2.5 text-center text-white">
            <a href="{{ route('admin.products.edit', ['product' => $product]) }}">Modifica</a>
        </button>
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
        Elimina
        </button>
    </div>

    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Sei sicuro di voler eliminare?
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Cliccando su elimina il prodotto verrà eliminato per sempre. Sei sicuro di voler continuare?
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form 
                    action="{{ route('admin.products.destroy', ['product' => $product]) }}"
                    method="POST"
                    class="d-inline-block"
                    id="confirm_delete">
                    @csrf
                    @method('delete')
                        <button
                        class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                        >
                        Elimina
                        </button>
                    </form>
                    <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Torna indietro</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection