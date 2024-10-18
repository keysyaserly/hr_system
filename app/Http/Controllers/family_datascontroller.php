<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyData; // Pastikan nama model sesuai dengan nama model Anda

class FamilyDatasController extends Controller
{
    // Menampilkan daftar data keluarga
    public function index()
    {
        $familyDatas = FamilyData::all(); // Ambil semua data keluarga dari database
        return view('family_datas.index', compact('familyDatas')); // Tampilkan view dengan data keluarga
    }

    // Menampilkan form untuk menambah data keluarga
    public function create()
    {
        return view('family_datas.create'); // Tampilkan form tambah data keluarga
    }

    // Menyimpan data keluarga baru
    public function store(Request $request)
    {
        $request->validate([
            'mate_name' => 'nullable|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'wedding_certificate_number' => 'nullable|string|max:255',
        ]);

        FamilyData::create($request->all()); // Simpan data keluarga baru ke database

        return redirect()->route('family_datas.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data keluarga
    public function edit($id)
    {
        $familyData = FamilyData::findOrFail($id); // Ambil data keluarga berdasarkan ID
        return view('family_datas.edit', compact('familyData')); // Tampilkan form edit dengan data keluarga
    }

    // Mengupdate data keluarga
    public function update(Request $request, $id)
    {
        $request->validate([
            'mate_name' => 'nullable|string|max:255',
            'child_name' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'wedding_certificate_number' => 'nullable|string|max:255',
        ]);

        $familyData = FamilyData::findOrFail($id); // Ambil data keluarga berdasarkan ID
        $familyData->update($request->all()); // Update data keluarga

        return redirect()->route('family_datas.index')->with('success', 'Data keluarga berhasil diperbarui.');
    }

    // Menampilkan detail data keluarga
    public function show($id)
    {
        $familyData = FamilyData::findOrFail($id); // Ambil data keluarga berdasarkan ID
        return view('family_datas.show', compact('familyData')); // Tampilkan detail data keluarga
    }

    // Menghapus data keluarga
    public function destroy($id)
    {
        $familyData = FamilyData::findOrFail($id); // Ambil data keluarga berdasarkan ID
        $familyData->delete(); // Hapus data keluarga

        return redirect()->route('family_datas.index')->with('success', 'Data keluarga berhasil dihapus.');
    }
}
