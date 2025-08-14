<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{

    public function index()
    {
        try {
            $users = User::select(['id', 'name', 'username', 'email', 'created_at', 'updated_at'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('users.index', compact('users'));
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memuat data users: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validated();
            $validatedData['password'] = Hash::make($validatedData['password']);
            unset($validatedData['password_confirmation']);

            User::create($validatedData);
            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User baru berhasil ditambahkan!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal menambah user: ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('profile.edit')
                ->with('info', 'Gunakan halaman Profile untuk mengedit data Anda sendiri.');
        }

        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('profile.edit')
                ->with('error', 'Tidak dapat mengedit akun sendiri melalui User Management.');
        }

        DB::beginTransaction();

        try {
            $user->update($request->validated());
            DB::commit();

            return redirect()
                ->route('users.show', $user)
                ->with('success', 'User berhasil diupdate!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal mengupdate user: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('profile.settings')
                ->with('error', 'Gunakan halaman Settings untuk mengubah password Anda sendiri.');
        }

        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        DB::beginTransaction();

        try {
            $user->update([
                'password' => Hash::make($validated['password'])
            ]);

            DB::commit();

            return redirect()
                ->route('users.show', $user)
                ->with('success', 'Password user berhasil diupdate!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Gagal mengupdate password: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')
                ->with('error', 'Tidak dapat menghapus akun sendiri melalui User Management.');
        }

        DB::beginTransaction();

        try {
            $user->delete();
            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User berhasil dihapus!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}
