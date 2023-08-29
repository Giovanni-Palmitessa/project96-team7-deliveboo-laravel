@extends('admin.layouts.base')
@section('contents')
    <h1>Prodotti</h1>

    @if (session('delete_success'))
    @php
    $product = session('delete_success')
    @endphp
    <div class="bg-red-600">
        Il product "{{ $product->name }}" è stato eliminato per sempre
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Immagine</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <th scope="row">{{ $product->name }}</th>
                    <th scope="row">{{ $product->slug }}</th>
                    <th scope="row">{{ $product->ingredients }}</th>
                    <th scope="row">{{ $product->price }}</th>
                    <th scope="row">{{ $product->description }}</th>
                    <th scope="row">
                        <img src="{{ $product->url_image }}" alt="{{ $product->name }}" class="w-24 h-24 rounded-full mr-4">
                    </th>
                    <th>
                        <a href="{{ route('admin.products.show', ['product' => $product]) }}">Vista</a>
                        <a href="{{ route('admin.products.edit', ['product' => $product]) }}">Modifica</a>
                        <form 
                            action="{{ route('admin.products.destroy', ['product' => $product]) }}"
                            method="POST"
                            class="d-inline-block"
                            id="confirm_delete">
                            @csrf
                            @method('delete')
                            <button
                            class="bg-red-600"
                            >
                            Elimina
                            </button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection
