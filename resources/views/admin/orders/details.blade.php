@extends('admin.layouts.base')
@section('contents')
    <div>
        <h1 class=" font-bold text-gray-600">Dettagli ordine</h1>
        <p><span class="font-bold text-secondary">Id ordine: </span> #{{ $order->id }}</p>
        <p><span class="font-bold text-secondary">Nome: </span>{{ $order->name }}</p>
        <p><span class="font-bold text-secondary">Cognome: </span>{{ $order->surname }}</p>
        <p><span class="font-bold text-secondary">Email: </span>{{ $order->email }}</p>
        <p><span class="font-bold text-secondary">Totale Ordine:</span> {{ $order->total_price }}€</p>
        <p>
            <span class="font-bold text-secondary">Data di Pagamento: </span>
            {{ \Carbon\Carbon::parse($order->payment_date)->format('d/m/Y') }}

        </p>
        <p>
            <span class="font-bold text-secondary">Orario di Pagamento: </span>
            {{ \Carbon\Carbon::parse($order->payment_date)->format('H:i') }}
        </p>



        <h2 class=" mt-10 font-bold text-gray-600 ">Prodotti Ordinati:</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <table class="min-w-full text-center table-auto">
                <thead>
                    <tr>
                        <th class="p-2 whitespace-nowrap font-bold text-secondary">Nome</th>
                        <th class="p-2 whitespace-nowrap font-bold text-secondary">Prezzo unitario</th>
                        <th class="p-2 whitespace-nowrap font-bold text-secondary">Quantità ordinata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td class="p-2 whitespace-nowrap">{{ $product->name }}</td>
                            <td class="p-2 whitespace-nowrap">{{ $product->price }} €</td>
                            <td class="p-2 whitespace-nowrap">{{ $product->pivot->product_quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
