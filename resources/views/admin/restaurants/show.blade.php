@extends('admin.layouts.base')
@section('contents')
<h1 class="text-center text-3xl mb-2 text-secondary">{{ $restaurant->name}}</h1>
<div class="container mx-auto max-w-screen-xl px-2">
    <div class=" bg-white border border-gray-200 rounded-lg shadow">
        <div>
            <img class="rounded-t-lg h-52" src="{{ asset('storage/' . $restaurant->url_image) }}" alt="{{$restaurant->name}}"/>
        </div>

        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$restaurant->name}}</h5>
            
            <p class="mb-3 font-normal text-gray-700">{{$restaurant->description}}</p>
            <p class="mb-3 font-normal text-gray-700">{{$restaurant->city}}</p>
            <p class="mb-3 font-normal text-gray-700">{{$restaurant->vat}}</p>
            <ul>
                <li><h3>Categorie:</h3></li>
                @foreach ($restaurant->categories as $category)
                <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

