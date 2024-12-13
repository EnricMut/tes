<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Editar Concurso</h1>
        <div id="loading" class="text-center text-gray-500">Cargando datos...</div>
        <form id="edit-contest-form" class="bg-white p-6 rounded-lg shadow-lg hidden" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-700">Título</label>
                <input type="text" id="title" name="title" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="dateStart" class="block text-sm font-semibold text-gray-700">Fecha Inicio</label>
                <input type="datetime-local" id="dateStart" name="dateStart" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="dateEnd" class="block text-sm font-semibold text-gray-700">Fecha Fin</label>
                <input type="datetime-local" id="dateEnd" name="dateEnd" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="numCategories" class="block text-sm font-semibold text-gray-700">Número de Categorías</label>
                <input type="number" id="numCategories" name="numCategories" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Actualizar</button>
            </div>
        </form>
        <div id="error-message" class="mt-4 text-red-500 hidden"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const contestId = "{{ $contest->idContest }}"; // Asegúrate de pasar 'idContest' correctamente desde el controlador
        const apiUrl = `http://127.0.0.1:8000/api/contest/${contestId}`;

        // Obtener datos del concurso desde la API
        fetch(apiUrl, {
            headers: { 'Accept': 'application/json' },
        })
        .then(response => response.json())
        .then(data => {
            // Llenar el formulario con los datos
            document.getElementById('title').value = data.title;
            document.getElementById('dateStart').value = new Date(data.dateStart).toISOString().slice(0, 16);
            document.getElementById('dateEnd').value = new Date(data.dateEnd).toISOString().slice(0, 16);
            document.getElementById('numCategories').value = data.numCategories;

            document.getElementById('loading').classList.add('hidden');
            document.getElementById('edit-contest-form').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('loading').textContent = 'Error al cargar los datos.';
        });

        // Manejar la actualización del concurso
        document.getElementById('edit-contest-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            // Convertir fechas a timestamps
            const dateStart = new Date(document.getElementById('dateStart').value).getTime() / 1000;
            const dateEnd = new Date(document.getElementById('dateEnd').value).getTime() / 1000;

            formData.set('dateStart', dateStart);
            formData.set('dateEnd', dateEnd);

            fetch(apiUrl, {
                method: 'PUT',
                body: JSON.stringify(Object.fromEntries(formData)),
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('error-message').textContent = data.error;
                    document.getElementById('error-message').classList.remove('hidden');
                } else {
                    alert('Concurso actualizado exitosamente');
                    window.location.href = '/contests'; // Redirige a la lista
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('error-message').textContent = 'Error al actualizar el concurso.';
                document.getElementById('error-message').classList.remove('hidden');
            });
        });
    });
    </script>
</body>
</html>
