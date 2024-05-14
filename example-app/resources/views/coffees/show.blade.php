<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $coffee['title'] }}</title>
</head>
<body>
<h1>{{ $coffee['title'] }}</h1>
<p>Description: {{ $coffee['description'] }}</p>
<img src="{{$coffee['image']}}" alt="coffee img">
</body>
</html>
