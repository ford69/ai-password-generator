<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AI Password Generator')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<style>
    .form-box {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
</style>
<body class="bg-gray-100">

    <!-- Navbar -->
    <header class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-white text-black px-12 py-3 rounded-full shadow-lg flex items-center justify-between w-[80%] max-w-4xl">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo/tide-logo copy.png') }}" alt="Logo" class=" h-14">
        </div>
        <nav class="flex space-x-8 text-sm">
            <a href="#" class="hover:text-blue-500">Products</a>
            <a href="#" class="hover:text-blue-500">Resources</a>
            <a href="#" class="hover:text-blue-500">Pricing</a>
        </nav>
        <div class="flex space-x-5 items-center">
            <a href="#" class="text-sm hover:text-blue-500">Sign in</a>
            <button class="bg-blue-500 text-white px-5 py-2 rounded-full text-sm font-semibold hover:bg-blue-700">
                Get started free
            </button>
        </div>
    </header>



    <!-- Main Content -->
    <main class="min-h-screen bg-gradient-to-br from-[#1a285f] to-[#4b0082] text-white">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-3">
        <p>&copy; {{ date('Y') }} Tide Password Generator. All rights reserved.</p>
    </footer>

</body>
</html>
