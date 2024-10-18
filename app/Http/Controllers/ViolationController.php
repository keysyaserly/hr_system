<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::all();
        return view('violations.index', compact('violations'));
    }

    public function create()
    {
        return view('violations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_number' => 'required|string',
            'jenis_pelanggaran' => 'required|string',
            'tanggal_pelanggaran' => 'required|date',
            'type' => 'required|string',
            'deskripsi' => 'required|string',
            'catatan_hrd' => 'nullable|string', // Tambahkan catatan HRD
        ]);

        Violation::create($validatedData);

        return redirect()->route('violations.index')->with('success', 'Data pelanggaran berhasil disimpan.');
    }

    public function show(Violation $violation)
    {
        return view('violations.show', compact('violation'));
    }

    public function edit(Violation $violation)
    {
        return view('violations.edit', compact('violation'));
    }


    public function destroy(Violation $violation)
{
    // Hapus data pelanggaran
    $violation->delete();

    // Redirect kembali ke daftar pelanggaran dengan pesan sukses
    return redirect()->route('violations.index')->with('success', 'Data pelanggaran berhasil dihapus.');
}


    public function update(Request $request, Violation $violation)
    {
        $validatedData = $request->validate([
            'id_number' => 'required|string',
            'jenis_pelanggaran' => 'required|string',
            'tanggal_pelanggaran' => 'required|date',
            'deskripsi' => 'required|string',
            'catatan_hrd' => 'nullable|string', // Tambahkan catatan HRD
        ]);

        $violation->update($validatedData);

        return redirect()->route('violations.index')->with('success', 'Data pelanggaran berhasil diperbarui.');
    }
}
