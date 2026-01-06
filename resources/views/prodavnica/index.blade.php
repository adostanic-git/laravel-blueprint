<!DOCTYPE html>
<html>
<head>
    <title>Prodavnica</title>
</head>
<body>
    <h1>Prodavnica proizvoda od kruške</h1>

    <ul>
        @foreach($products as $product)
            <li>
                {{ $product->naziv }} -
                {{ $product->cena }} RSD
            </li>
        @endforeach
    </ul>
</body>
</html>
