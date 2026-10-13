<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Aplikasi Sertifikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex flex-col justify-between">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shadow-sm">
        <div class="font-bold text-xl text-gray-800">
            <a href="{{ url('/') }}">Aplikasi Sertifikasi</a>
        </div>
        <div>
            <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-600 hover:underline">Sudah punya akun? Login</a>
        </div>
    </nav>

    <!-- Content Form Register -->
    <div class="flex flex-col items-center justify-center px-4 my-auto">
        <div class="bg-white p-8 rounded-xl shadow-md max-w-md w-full">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Daftar Akun Baru</h2>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                    <ul class="list-disc pl-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md font-semibold text-sm transition">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-xs text-gray-500 border-t border-gray-200 bg-white">
        &copy; {{ date('Y') }} Aplikasi Sertifikasi. All rights reserved.
    </footer>

</body>
</html>