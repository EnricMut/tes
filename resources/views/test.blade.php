<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
<h2>TEST</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
        <tr>
            <th>{{ $name }}</th>
            <th>{{ $age }}</th>
        </tr>
    </table>
    <br>
    <a href="{{ route("test2") }}">Test2</a>
</body>
</html>