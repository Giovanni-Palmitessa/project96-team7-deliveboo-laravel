<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deliveboo</title>
    @vite(['resources/css/app.css', 'resources/js/productValidationCreate.js'])
</head>
<body>
    <div class="container">
        <main>
            @yield('contents')
        </main>
    </div>
</body>
</html>