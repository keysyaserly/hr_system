<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Metode update untuk memperbarui data pengguna
    public function update(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);

        // Cek apakah pengguna ada
        if (!$user) {
            return redirect()->route('users.index')->withErrors('User not found');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',  // Validasi name
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),  // Cek email unik kecuali pengguna yang sama
            ],
            'password' => 'nullable|string|min:8|confirmed',  // Validasi password (jika diubah)
            
        ]);

        // Jika password ada di input, lakukan enkripsi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update data user dengan hanya kolom yang diizinkan
        $user->update($request->only([
            'name',
            'email',

        ]));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
}
