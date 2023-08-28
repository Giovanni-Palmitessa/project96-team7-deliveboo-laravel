
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
            @foreach ($restaurants as $restaurant)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$restaurant->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$restaurant->city}}
                    </td>
                    <td class="px-6 py-4">
                        {{$restaurant->address}}
                    </td>
                    <td class="px-6 py-4">
                        {{$restaurant->priceRange}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant]) }}">View</a>
                        <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant]) }}">Edit</a>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
</div>
