<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zakaria - MediaTasks</title>
    @vite('resources/css/app.css')

    <script>
        function addTask(day, column) {
            let container = document.getElementById(day + '-' + column);
            let newTask = document.createElement('div');
            newTask.classList.add('flex', 'items-center', 'space-x-2', 'mt-2');
            newTask.innerHTML = `
                <input type="checkbox" class="w-5 h-5">
                <input type="text" placeholder="Enter task" class="border p-2 rounded w-full">
            `;
            container.appendChild(newTask);
        }
    </script>
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen p-6">

    <h1 class="text-3xl font-bold text-red-500 mb-6">Zakaria's Task Table</h1>

    <table class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-red-500 text-white">
            <tr>
                <th class="p-4">Jour</th>
                <th class="p-4">Tâches Quotidiennes</th>
                <th class="p-4">Tâches Projet</th>
            </tr>
        </thead>
        <tbody>
            @php
                $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
            @endphp

            @foreach ($days as $day)
                <tr class="border-b">
                    <td class="p-4 text-center font-bold">{{ $day }}</td>
                    <td class="p-4">
                        <div id="{{ $day }}-daily">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-5 h-5">
                                <input type="text" placeholder="Enter task" class="border p-2 rounded w-full">
                            </div>
                        </div>
                        <button onclick="addTask('{{ $day }}', 'daily')" class="mt-2 text-blue-500">+ Add Task</button>
                    </td>
                    <td class="p-4">
                        <div id="{{ $day }}-project">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" class="w-5 h-5">
                                <input type="text" placeholder="Enter task" class="border p-2 rounded w-full">
                            </div>
                        </div>
                        <button onclick="addTask('{{ $day }}', 'project')" class="mt-2 text-blue-500">+ Add Task</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-black hover:text-blue-500 transition">
        Go to Welcome Page
    </a>

</body>
</html>
