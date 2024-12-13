<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Create New Contest</h1>
        <form id="contest-form" class="bg-white p-6 rounded-lg shadow-lg" method="POST" action="http://127.0.0.1:8000/api/create-contest">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-700">Contest Title</label>
                <input type="text" id="title" name="title" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="dateStart" class="block text-sm font-semibold text-gray-700">Contest Start Date</label>
                <input type="datetime-local" id="dateStart" name="dateStart" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="dateEnd" class="block text-sm font-semibold text-gray-700">Contest End Date</label>
                <input type="datetime-local" id="dateEnd" name="dateEnd" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="numCategories" class="block text-sm font-semibold text-gray-700">Number of Categories</label>
                <input type="number" id="numCategories" name="numCategories" class="mt-2 block w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg w-full">Create Contest</button>
            </div>
        </form>
        <div id="error-message" class="mt-4 text-red-500 hidden"></div>
    </div>

    <script>
        document.getElementById('contest-form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Obtener los datos del formulario
        const formData = new FormData(this);

        // Convertir las fechas a timestamps en segundos
        const dateStart = Math.floor(new Date(document.getElementById('dateStart').value).getTime() / 1000);
        const dateEnd = Math.floor(new Date(document.getElementById('dateEnd').value).getTime() / 1000);

        // Agregar las fechas como timestamps al formulario
        formData.set('dateStart', dateStart);
        formData.set('dateEnd', dateEnd);

        const url = 'http://127.0.0.1:8000/api/create-contest';

        // Enviar los datos usando fetch
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('error-message').textContent = data.error;
                document.getElementById('error-message').classList.remove('hidden');
            } else {
                window.location.href = '/contests'; // Redirigir al listado
            }
        })
        .catch(error => {
            document.getElementById('error-message').textContent = 'An error occurred. Please try again.';
            document.getElementById('error-message').classList.remove('hidden');
        });
    });
    </script>
</body>
</html>
