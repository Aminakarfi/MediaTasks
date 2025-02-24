<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ibtisam - MediaTasks</title>
    @vite('resources/css/app.css')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            loadTasks(); // Load tasks when page loads
        });

        function addTask(day, column) {
            let taskContainer = document.getElementById(`${day}-${column}`);

            let taskRow = document.createElement("div");
            taskRow.classList.add("flex", "items-center", "space-x-2", "mt-2");

            let checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.classList.add("w-5", "h-5");

            let inputField = document.createElement("input");
            inputField.type = "text";
            inputField.placeholder = "Enter task";
            inputField.classList.add("border", "p-2", "rounded", "w-full");

            let validateButton = document.createElement("button");
            validateButton.textContent = "Validate";
            validateButton.classList.add("px-3", "py-1", "bg-blue-500", "text-white", "rounded", "hover:bg-blue-700");

            let deleteButton = document.createElement("button");
            deleteButton.textContent = "Delete";
            deleteButton.classList.add("px-3", "py-1", "bg-red-500", "text-white", "rounded", "hover:bg-red-700");

            validateButton.onclick = function() {
                if (inputField.value.trim() === "") {
                    alert("Please enter a task before validating.");
                    return;
                }
                inputField.setAttribute("readonly", true);
                validateButton.disabled = true;
                validateButton.textContent = "Saved";
                validateButton.classList.remove("bg-blue-500", "hover:bg-blue-700");
                validateButton.classList.add("bg-green-500");
                
                saveTask(day, column, inputField.value); // Save to Local Storage
            };

            deleteButton.onclick = function() {
                taskContainer.removeChild(taskRow);
                deleteTask(day, column, inputField.value); // Remove from Local Storage
            };

            taskRow.appendChild(checkbox);
            taskRow.appendChild(inputField);
            taskRow.appendChild(validateButton);
            taskRow.appendChild(deleteButton);
            taskContainer.appendChild(taskRow);
        }

        function saveTask(day, column, task) {
            let tasks = JSON.parse(localStorage.getItem("tasks")) || {};
            if (!tasks[day]) tasks[day] = { daily: [], project: [] };
            tasks[day][column].push(task);
            localStorage.setItem("tasks", JSON.stringify(tasks));
        }

        function deleteTask(day, column, task) {
            let tasks = JSON.parse(localStorage.getItem("tasks")) || {};
            if (!tasks[day]) return;
            tasks[day][column] = tasks[day][column].filter(t => t !== task);
            localStorage.setItem("tasks", JSON.stringify(tasks));
        }

        function loadTasks() {
            let tasks = JSON.parse(localStorage.getItem("tasks")) || {};
            for (let day in tasks) {
                for (let column in tasks[day]) {
                    tasks[day][column].forEach(task => {
                        let taskContainer = document.getElementById(`${day}-${column}`);

                        let taskRow = document.createElement("div");
                        taskRow.classList.add("flex", "items-center", "space-x-2", "mt-2");

                        let checkbox = document.createElement("input");
                        checkbox.type = "checkbox";
                        checkbox.classList.add("w-5", "h-5");

                        let inputField = document.createElement("input");
                        inputField.type = "text";
                        inputField.value = task;
                        inputField.setAttribute("readonly", true);
                        inputField.classList.add("border", "p-2", "rounded", "w-full");

                        let validateButton = document.createElement("button");
                        validateButton.textContent = "Saved";
                        validateButton.classList.add("px-3", "py-1", "bg-green-500", "text-white", "rounded");

                        let deleteButton = document.createElement("button");
                        deleteButton.textContent = "Delete";
                        deleteButton.classList.add("px-3", "py-1", "bg-red-500", "text-white", "rounded", "hover:bg-red-700");

                        deleteButton.onclick = function() {
                            taskContainer.removeChild(taskRow);
                            deleteTask(day, column, task); // Remove from Local Storage
                        };

                        taskRow.appendChild(checkbox);
                        taskRow.appendChild(inputField);
                        taskRow.appendChild(validateButton);
                        taskRow.appendChild(deleteButton);
                        taskContainer.appendChild(taskRow);
                    });
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen p-6">

    <h1 class="text-3xl font-bold text-red-500 mb-6">Ibtisam's Task Table</h1>

    <table class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-red-500 text-white">
            <tr>
                <th class="p-4">Days</th>
                <th class="p-4">Daily Tasks</th>
                <th class="p-4">Tasks Project </th>
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
                        <div id="{{ $day }}-daily"></div>
                        <button onclick="addTask('{{ $day }}', 'daily')" class="mt-2 text-blue-500">+ Add Task</button>
                    </td>
                    <td class="p-4">
                        <div id="{{ $day }}-project"></div>
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
