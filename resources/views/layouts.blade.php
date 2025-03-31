<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AI Password Generator')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto">
            <h1 class="text-xl font-bold"><a href="{{ url('/') }}">AI Password Generator</a></h1>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-3 mt-10">
        <p>&copy; {{ date('Y') }} AI Password Generator. All rights reserved.</p>
    </footer>

</body>
</html>
