<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffees</title>
    <style>
        /* Voeg hier je eigen CSS-stijlen toe */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        select, input[type="text"], button {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
        }

        li {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-bottom: 10px;
        }

        li a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }

        li img {
            width: 100%;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        li p {
            margin: 0;
        }
    </style>
</head>
<body>

<h1>Coffees</h1>

<form action="/coffees" method="get">
    Sort By:
    <select name="sort_by">
        <option value="id">ID</option>
        <option value="title">Name</option>
        <option value="description">Price</option>
    </select>
    <button type="submit">Sort</button>
</form>

<form action="{{ route('coffees.search') }}" method="get">
    <input type="text" name="search" placeholder="Search by title">
    <button type="submit">Search</button>
</form>

<ul>
    @foreach ($coffees as $coffee)
        <li>
            <a href="/coffees/{{ $coffee['id'] }}">{{ $coffee['title'] }}</a>
            <img src="{{$coffee['image']}}" alt="coffee image">
            <p>{{ $coffee['description'] }}</p>
        </li>
    @endforeach
</ul>

</body>
</html>
