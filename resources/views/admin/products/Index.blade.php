<h1>Prodotti</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Ingredients</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">UrlImage</th>
            <th scope="col">Restaurant_ID</th>
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
                <th scope="row">{{ $product->url_image }}</th>
                <th scope="row">{{ $product->restaurant_id }}</th>
            </tr>
        @endforeach
    </tbody>
</table>