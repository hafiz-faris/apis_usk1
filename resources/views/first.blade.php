<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sertifikasi JWD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-between">

    <!-- Navbar / Header (Tombol Login & Register ada di sini) -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shadow-sm">
        <div class="font-bold text-xl text-gray-800">
            Aplikasi Sertifikasi
        </div>
        <div class="flex gap-3">
            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-semibold transition">
                Register
            </a>
        </div>
    </nav>

    <!-- Main Content (Tanpa tombol ganda di bawah teks) -->
    <div class="flex flex-col items-center justify-center text-center px-4 my-auto">
        <div class="bg-white p-10 rounded-xl shadow-md max-w-xl w-full">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-4">
                Selamat Datang di Aplikasi Sertifikasi
            </h1>
            <p class="text-gray-600 text-sm sm:text-base">
                Kelola data skema sertifikasi dan peserta dengan mudah, cepat, dan terstruktur. Silakan pilih menu di pojok kanan atas untuk masuk atau mendaftarkan akun.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-xs text-gray-500 border-t border-gray-200 bg-white">
        &copy; {{ date('Y') }} Aplikasi Sertifikasi. All rights reserved.
    </footer>

</body>
</html>