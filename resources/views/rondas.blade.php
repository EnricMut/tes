<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rondas</title>
</head>
<body>
    <h1>Lista de Rondas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Ronda</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rondas as $ronda)
                <tr>
                    <td>{{ $ronda->categoria->nombre }}</td>
                    <td>{{ $ronda->nombre }}</td>
                    <td>{{ $ronda->fecha_inicio }}</td>
                    <td>{{ $ronda->fecha_fin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
