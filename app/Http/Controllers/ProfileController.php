<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Tampilkan profil pengguna yang sedang login.
     */
    public function index()
    {
        $user = auth()->user();
        return view('dashboard.profile.index', compact('user'));
    }

    /**
     * Perbarui data profil dan kata sandi mandiri.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ];

        // Jika user ingin mengganti kata sandi
        if ($request->filled('password')) {
            $rules['current_password'] = 'required';
            $rules['password'] = 'required|string|min:8|confirmed|different:current_password';
        }

        $request->validate($rules, [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.unique' => 'Email ini sudah digunakan oleh akun lain.',
            'current_password.required' => 'Kata sandi saat ini wajib diisi untuk mengganti kata sandi.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
            'password.different' => 'Kata sandi baru harus berbeda dari kata sandi saat ini.',
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors([
                    'current_password' => 'Kata sandi saat ini tidak cocok dengan data kami.'
                ])->withInput();
            }
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil dan informasi akun Anda berhasil diperbarui.');
    }
}
