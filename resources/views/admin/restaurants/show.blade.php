@extends('admin.layouts.base')
@section('contents')
<h1>Sono lo Show</h1>


<div class=" bg-white border border-gray-200 rounded-lg shadow">
    <img class="rounded-t-lg h-52" src="{{ asset('storage/' . $restaurant->url_image) }}" alt="{{$restaurant->name}}" />

    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$restaurant->name}}</h5>
        
        <p class="mb-3 font-normal text-gray-700">{{$restaurant->description}}</p>
        <p class="mb-3 font-normal text-gray-700">{{$restaurant->city}}</p>
        <p class="mb-3 font-normal text-gray-700">{{$restaurant->vat}}</p>
        <ul>
            <li><h3>Categories:</h3></li>
            @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

