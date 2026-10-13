<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta - Sertifikasi JWD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <span class="font-bold text-xl text-blue-600">Dashboard Peserta</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold">
                Logout
            </button>
        </form>
    </nav>

    <!-- Content -->
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang, {{ $user->name }}!</h2>
            <p class="text-gray-600 mb-6">Ini adalah halaman dashboard peserta program Sertifikasi Junior Web Developer (JWD).</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-200 p-4 rounded-lg bg-blue-50">
                    <h3 class="font-semibold text-blue-800 mb-1">Status Pendaftaran</h3>
                    <p class="text-sm text-gray-600">Akun Anda aktif dan terdaftar sebagai peserta.</p>
                </div>
                <div class="border border-gray-200 p-4 rounded-lg bg-green-50">
                    <h3 class="font-semibold text-green-800 mb-1">Informasi Kontak</h3>
                    <p class="text-sm text-gray-600">Email: {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>