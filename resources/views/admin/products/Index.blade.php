@extends('admin.layouts.base')
@section('contents')
    <h1 class="text-center text-3xl mb-2 text-secondary">PRODOTTI</h1>

    @if (session('delete_success'))
        @php
            $product = session('delete_success');
        @endphp
        <div class="container mx-auto max-w-screen-xl px-2">
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Il product "{{ $product->name }}" è stato eliminato per sempre</span>
            </div>
        </div>
    @endif

    <div class="container mx-auto max-w-screen-xl px-2">
        <table class="w-full text-sm text-left text-black dark:text-gray-400">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    {{-- <th scope="col">ID</th> --}}
                    <th scope="col" class="px-6 py-3">Nome</th>
                    {{-- <th scope="col">Slug</th> --}}
                    <th scope="col" class="px-6 py-3">Ingredienti</th>
                    <th scope="col" class="px-6 py-3">Prezzo</th>
                    <th scope="col" class="px-6 py-3">Disponibilità</th>
                    {{-- <th scope="col">Descrizione</th> --}}
                    {{-- <th scope="col">Immagine</th> --}}
                    <th scope="col" class="px-6 py-3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        {{-- <td scope="row">{{ $product->id }}</td> --}}
                        <td scope="row" class="px-6 py-4">{{ $product->name }}</td>
                        {{-- <td scope="row">{{ $product->slug }}</td> --}}
                        <td scope="row" class="px-6 py-4 max-w-lg">{{ $product->ingredients }}</td>
                        <td scope="row" class="px-6 py-4 text-center">{{ $product->price }}</td>
                        <td scope="row" class="px-6 py-4 max-w-lg">
                            <form action="{{ route('admin.products.toggleProductVisibility', $product->id) }}"
                                method="post">
                                @csrf
                                <input type="checkbox" name="visible" value="1"
                                    {{ $product->visible ? 'checked' : '' }} onChange="this.form.submit()">
                                <label for="visible">Prodotto disponibile</label>
                            </form>
                        </td>
                        {{-- <td scope="row">{{ $product->description }}</td> --}}
                        {{-- <td scope="row">
                            <img src="{{ $product->url_image }}" alt="{{ $product->name }}" class="w-24 h-24 rounded-full mr-4">
                        </td> --}}
                        <td class="px-6 py-4 flex gap-1">
                            <button
                                class="rounded-lg bg-blue-500 hover:bg-blue-700 font-medium text-sm text-center text-white">
                                <a href="{{ route('admin.products.show', ['product' => $product]) }}"
                                    class="px-5 py-2.5">Vista</a>
                            </button>
                            <button
                                class="rounded-lg bg-yellow-300 hover:bg-yellow-500 font-medium text-sm text-center text-white">
                                <a href="{{ route('admin.products.edit', ['product' => $product]) }}"
                                    class="px-5 py-2.5">Modifica</a>
                            </button>
                            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                Elimina
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modal --}}
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Sei sicuro di voler eliminare?
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
                        <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST"
                            class="d-inline-block" id="confirm_delete">
                            @csrf
                            @method('delete')
                            <button
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Elimina
                            </button>
                        </form>
                        <button data-modal-hide="defaultModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Torna
                            indietro</button>
                    </div>
                </div>
            </div>
        </div>
        {{ $products->links() }}
    </div>
@endsection
