<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nik', 'like', "%{$search}%")
                             ->orWhere('no_pendaftaran', 'like', "%{$search}%")
                             ->orWhere('nama_peserta', 'like', "%{$search}%")
                             ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->oldest()
            ->paginate(10);

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|numeric|unique:pesertas,nik',
            'skema_id' => 'required|exists:skemas,id',
            'nama_peserta' => 'required|string|max:255',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus bernilai tepat 16 digit angka.',
            'nik.numeric' => 'NIK hanya boleh berisi angka.',
            'nik.unique' => 'NIK sudah terdaftar di dalam database.',
        ]);

        $data = $request->all();
        // Petakan jenis_kelamin ke kolom database jns_kelamin
        if (isset($data['jenis_kelamin'])) {
            $data['jns_kelamin'] = $data['jenis_kelamin'];
            unset($data['jenis_kelamin']);
        }

        Peserta::create($data);

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nik' => 'required|digits:16|numeric|unique:pesertas,nik,' . $peserta->id,
            'skema_id' => 'required|exists:skemas,id',
            'nama_peserta' => 'required|string|max:255',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus bernilai tepat 16 digit angka.',
            'nik.numeric' => 'NIK hanya boleh berisi angka.',
            'nik.unique' => 'NIK sudah terdaftar di dalam database.',
        ]);

        $data = $request->all();
        // Petakan jenis_kelamin ke kolom database jns_kelamin
        if (isset($data['jenis_kelamin'])) {
            $data['jns_kelamin'] = $data['jenis_kelamin'];
            unset($data['jenis_kelamin']);
        }

        $peserta->update($data);
        
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil dihapus.');
    }
}