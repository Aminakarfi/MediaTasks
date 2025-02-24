<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MediaTasks</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen p-6">

    <h1 class="text-3xl font-bold text-red-500 mb-6">Admin Task Table</h1>

    <!-- User Task Table -->
    <table class="w-full max-w-6xl bg-white shadow-lg rounded-lg overflow-hidden border-collapse">
        <thead class="bg-red-500 text-white">
            <tr class="border-b">
                <th class="p-4 border-r" rowspan="2">User</th> <!-- User column spans both rows -->
                <th class="p-4 border-r" colspan="2">Tasks</th> <!-- Tasks column spans two sub-columns -->
                @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                    <th class="p-4 border-r">{{ $day }}</th>
                @endforeach
            </tr>
            <tr class="border-b">
                
                @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                    <!-- Empty headers for days of the week -->
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b">
                    <td class="p-4 font-bold border-r" rowspan="2">{{ $user['name'] }}</td> <!-- User spans both rows -->
                    <td class="">Daily Tasks</td> <!-- Added "Daily Tasks" -->
                    @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                        <td class="p-4 text-center border-b border-r"></td>
                    @endforeach
                </tr>
                <tr class="border-b">
                    <td class="">Tasks Project</td> <!-- Added "Tasks Project" -->
                    @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $day)
                        <td class="p-4 text-center border-b border-r"></td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-black hover:text-blue-500 transition">
        Go to Welcome Page
    </a>

</body>
</html>
