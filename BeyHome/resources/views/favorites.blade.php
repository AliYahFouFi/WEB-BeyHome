<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Favorite List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .alert {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            margin: 20px;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
            text-align: center;
        }

        .wishlist-container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .wishlist-container h2 {
            text-align: center;
            color: #333;
        }

        .wishlist-container ul {
            list-style-type: none;
            padding: 0;
        }

        .wishlist-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .wishlist-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .wishlist-item-info {
            flex: 1;
            margin-left: 20px;
        }

        .wishlist-item-name {
            font-size: 18px;
            color: #333;
            text-decoration: none;
        }

        .wishlist-item-name:hover {
            text-decoration: underline;
        }

        .remove-from-wishlist-form {
            margin-left: 10px;
        }

        .remove-from-wishlist-form button {
            padding: 10px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-from-wishlist-form button:hover {
            background-color: #c0392b;
        }

        p {
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>
    <h1>Your Favorite List</h1>

    @if (session('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif

    @if ($favoriteItems->isEmpty())
        <p>Your Favorite list is empty.</p>
    @else
        <div class="wishlist-container">
            <h2>Your Favorites</h2>
            <ul>
                @foreach ($properties as $property)
                    <li class="wishlist-item">
                        <img src="#" alt="Property Image">
                        <div class="wishlist-item-info">
                            <ul>
                                <li>Name: {{ $property->name }}</li>
                                <li>Price: {{ $property->price }}</li>
                                <li>Booked: {{ $property->booked ? 'Yes' : 'No' }}</li>
                            </ul>
                        </div>
                        <form action="{{ route('favorites.destroy', $property->id) }}" method="POST"
                            class="remove-from-wishlist-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>
    @endif
    </div>
</body>

</html>
