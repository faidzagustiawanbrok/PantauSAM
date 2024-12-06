<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */

     public function update(ProfileUpdateRequest $request)
     {
         $user = $request->user();

         $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'telpon' => 'required|string|max:15',
             'alamat' => 'required|string|max:255',
             'kelamin' => 'required|in:laki-laki,perempuan,tidak ingin menyertakan',
             'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

         // Proses upload foto jika ada
if ($request->hasFile('foto')) {
    $foto = $request->file('foto');

    // Menyimpan gambar ke folder 'public/foto profil' di dalam 'storage/app'
    $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
    $fotoPath = $foto->storeAs('foto_profil', $profileImage, 'public');

if ($user->foto && Storage::exists('public/' . $user->foto)) {
    Storage::delete('public/' . $user->foto);
}

$user->foto = 'foto_profil/' . $profileImage; // Simpan path relatif

}

         // Update atribut lainnya
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->telpon = $request->input('telpon');
         $user->alamat = $request->input('alamat');
         $user->kelamin = $request->input('kelamin');

         // Simpan data pengguna
         $user->save();

         return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
     }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
