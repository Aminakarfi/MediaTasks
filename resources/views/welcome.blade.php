<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediaTasks</title>
    @vite('resources/css/app.css')
    <script>
        function toggleForm(id) {
            document.getElementById('admin-form').classList.add('hidden');
            document.getElementById('user-form').classList.add('hidden');
            document.getElementById(id).classList.remove('hidden');
        }
    </script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">

    <div class="text-center space-x-4">
        <button onclick="toggleForm('admin-form')" 
                class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-black hover:text-red-500 transition">
            Admin
        </button>
        <button onclick="toggleForm('user-form')" 
                class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-black hover:text-red-500 transition">
            User
        </button>
    </div>

    <!-- Error Message -->
    @if ($errors->any())
        <div class="mt-4 bg-red-100 text-red-700 p-3 rounded-lg">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Admin Login Form -->
<div id="admin-form" class="mt-6 p-6 bg-white shadow-lg rounded-lg w-80">
    <h2 class="text-xl font-bold text-center mb-4">Admin Login</h2>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your name" 
               class="border p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-red-500">
        <input type="password" name="password" placeholder="Enter your password" 
               class="border p-2 rounded w-full mt-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        <button type="submit" 
                class="bg-red-500 text-white px-4 py-2 rounded w-full mt-4 hover:bg-black hover:text-red-500 transition">
            Login
        </button>
    </form>
</div>

    <!-- User Login Form -->
    <div id="user-form" class="hidden mt-6 p-6 bg-white shadow-lg rounded-lg w-80">
        <h2 class="text-xl font-bold text-center mb-4">User Login</h2>
        <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter your name" 
                   class="border p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-red-500">
            <input type="password" name="password" placeholder="Enter your password" 
                   class="border p-2 rounded w-full mt-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            <select name="team" class="border p-2 rounded w-full mt-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="Prode">Prode</option>
                <option value="Artistique">Artistique</option>
                <option value="Captation">Captation</option>
            </select>
            <button type="submit" 
                    class="bg-red-500 text-white px-4 py-2 rounded w-full mt-4 hover:bg-black hover:text-red-500 transition">
                Login
            </button>
        </form>
    </div>

</body>
</html>
