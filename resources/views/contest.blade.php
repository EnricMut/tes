<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Concursos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Lista de Concursos</h1>
        <div class="mb-4 text-right">
            <a href="{{ route('contests.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Crear Nuevo Concurso
            </a>
        </div>
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Título</th>
                    <th class="py-3 px-6 text-left">Fecha Inicio</th>
                    <th class="py-3 px-6 text-left">Fecha Fin</th>
                    <th class="py-3 px-6 text-left">Número de Categorías</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($contests as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $item->title }}</td>
                        <!-- Asegúrate de formatear las fechas correctamente -->
                        <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($item->dateStart)->format('d/m/Y H:i') }}</td>
                        <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($item->dateEnd)->format('d/m/Y H:i') }}</td>
                        <td class="py-3 px-6 text-left">{{ $item->numCategories }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('contests.edit', $item->idContest) }}" class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
