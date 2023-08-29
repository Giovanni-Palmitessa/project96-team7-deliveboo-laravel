<h1>Sono lo Show</h1>


<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded-t-lg " src="{{ asset('storage/' . $restaurant->url_image) }}" alt="{{$restaurant->name}}" />

    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$restaurant->name}}</h5>
        
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$restaurant->description}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$restaurant->city}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$restaurant->vat}}</p>
    </div>
</div>
