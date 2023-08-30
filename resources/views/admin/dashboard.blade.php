@extends('admin.layouts.base')
@section('contents')
    @if ($restaurant)
        <div class="min-h-screen bg-gray-100 p-6 flex flex-col items-center">
            <!-- Header del ristorante -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $restaurant->name }}</h1>
                <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 m-auto">
                    <p class="text-gray-600">{{ $restaurant->description }}</p>
                    <p class="mt-4">{{ $restaurant->city }}, {{ $restaurant->address }}</p>
                    <p class="text-gray-500">Prezzo medio: {{ $restaurant->priceRange }}</p>
                    <div class="mt-4 flex justify-center items-center space-x-2">
                        <p class="text-yellow-500 font-bold text-xl">{{ $restaurant->rating_value }}</p>
                        <p class="text-gray-500">({{ $restaurant->review_count }} recensioni)</p>
                    </div>
                </div>
            </div>



        <!-- Prodotti -->
        <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Prodotti</h2>
            {{-- <ul>
                @foreach ($products as $product)
                    <li class="border-b border-gray-200 py-2 text-center">
                        <div>
                            {{ $product->name }}
                            <a href="{{ route('admin.products.show', ['product' => $product]) }}"
                            class="bg-secondary hover:bg-b_hover p-2 rounded-md">Vista</a>
                            <button class="bg-gray-500 hover:bg-gray-700 p-2 rounded-md">Nascondi</button>
                        </div>
                    </li>
                @endforeach
            </ul> --}}

            {{-- <ul>
                @foreach ($products as $product)
                    <li class="border-b border-gray-200 py-2 text-center">
                        {{ $product->name }}
                        <form action="{{ route('admin.products.toggleProductVisibility', $product->id) }}" method="post">
                            @csrf
                            <input type="checkbox" name="visible" value="1" {{ $product->visible ? 'checked' : '' }} onChange="this.form.submit()">
                            <label for="visible">Visibile</label>
                        </form>
                    </li>
                @endforeach
            </ul> --}}

            @foreach ($products as $product)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <img class="rounded-t-lg" src="{{ asset('storage/' . $product->url_image) }}" alt="{{ $product->name }}" />
                    
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $product->name }}
                        </h5>
                        
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>

                        <form action="{{ route('admin.products.toggleProductVisibility', $product->id) }}" method="post">
                            @csrf
                            <input type="checkbox" name="visible" value="1" {{ $product->visible ? 'checked' : '' }} onChange="this.form.submit()">
                            <label for="visible">Prodotto disponibile</label>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

            <!-- Ordini -->
            <div class="bg-white rounded-lg shadow-lg p-6 w-3/4 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Ordini</h2>
                <ul>
                    @foreach ($orders as $order)
                        <li class="border-b border-gray-200 py-2 text-center">Totale ordine: €{{ $order->total_price }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Nessun ristorante trovato</h1>
            <a href="{{ route('admin.restaurants.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-full">Crea
                Ristorante</a>
        </div>
    @endif
@endsection
