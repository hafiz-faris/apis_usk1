<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sertifikasi JWD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <span class="font-bold text-xl text-blue-600">Admin Dashboard</span>
            <div class="flex gap-4 text-sm">
                <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a>
                <a href="{{ route('skema.index') }}" class="text-gray-600 hover:text-blue-600">Data Skema</a>
                <a href="{{ route('peserta.index') }}" class="text-gray-600 hover:text-blue-600">Data Peserta</a>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold">
                Logout
            </button>
        </form>
    </nav>

    <!-- Content -->
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Selamat Datang, Admin!</h2>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-center">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Peserta</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPeserta }}</h3>
                </div>
                <a href="{{ route('peserta.index') }}" class="text-sm text-blue-600 font-semibold hover:underline">Kelola &rarr;</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-center">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Skema</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalSkema }}</h3>
                </div>
                <a href="{{ route('skema.index') }}" class="text-sm text-blue-600 font-semibold hover:underline">Kelola &rarr;</a>
            </div>
        </div>
    </div>

</body>
</html>