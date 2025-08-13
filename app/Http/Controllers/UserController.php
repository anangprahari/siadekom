<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        try {
            // Hapus email_verified_at dari select
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
            // Data sudah tervalidasi dari FormRequest
            $validatedData = $request->validated();

            // Hash password
            $validatedData['password'] = Hash::make($validatedData['password']);

            // Remove password_confirmation dari data yang akan disimpan
            unset($validatedData['password_confirmation']);

            // Create user
            $user = User::create($validatedData);

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
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validated();

            // Update user
            $user->update($validatedData);

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with('success', 'User berhasil diupdate!');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal mengupdate user: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request, String $username)
    {
        // Validation
        $validated = $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
        ]);

        try {
            // Find user by username
            $user = User::where('username', $username)->firstOrFail();

            // Update password
            $user->update([
                'password' => Hash::make($validated['password'])
            ]);

            return redirect()
                ->route('users.index')
                ->with('success', 'Password user berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal mengupdate password: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();

        try {

            // Delete user
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
