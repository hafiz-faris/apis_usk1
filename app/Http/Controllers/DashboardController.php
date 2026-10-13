<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Support\Facades\Auth; // Tambahkan import Auth ini

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Gunakan Auth::user()

        // Jika role admin, tampilkan statistik lengkap
        if ($user && $user->role === 'admin') {
            $totalPeserta = Peserta::count();
            $totalSkema = Skema::count();
            return view('admin.dashboard', compact('totalPeserta', 'totalSkema'));
        }

        // Jika role user biasa, tampilkan dashboard khusus peserta/user
        return view('user.dashboard', compact('user'));
    }
}