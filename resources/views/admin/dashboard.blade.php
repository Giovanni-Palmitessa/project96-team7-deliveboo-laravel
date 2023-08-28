<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Città
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Indirizzo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prezzo medio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Azioni
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($restaurant)
                    {{ $restaurant->name }}
                    @foreach ($products as $product)
                        <p>{{ $product->name }}</p>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</x-app-layout>
