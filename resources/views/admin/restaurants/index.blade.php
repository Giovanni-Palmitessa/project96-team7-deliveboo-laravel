@extends('admin.layouts.base')
@section('contents')
    <div class="container mx-auto max-w-screen-xl px-2 mt-[120px]">
        <table class="w-full text-sm text-left text-black dark:text-gray-400">
            <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                        Città
                    </th>
                    <th scope="col" class="px-6 py-3 hidden md:table-cell">
                        Indirizzo
                    </th>
                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                        Prezzo medio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Azioni
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($restaurant)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $restaurant->name }}
                        </th>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            {{ $restaurant->city }}
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            {{ $restaurant->address }}
                        </td>
                        <td class="px-6 py-4 hidden sm:table-cell">
                            {{ $restaurant->priceRange }}
                        </td>
                        <td class="px-6 py-4 flex gap-1">
                            <button class="rounded-lg bg-blue-500 hover:bg-blue-700 font-medium text-sm text-center text-white py-2.5">
                                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant]) }}"
                                class="px-5 py-2.5">Vista</a>
                            </button>
                            <button class="rounded-lg bg-yellow-300 hover:bg-yellow-500 font-medium text-sm text-center text-white">
                                <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant]) }}"
                                class="px-5 py-2.5">Modifica</a>
                            </button>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
