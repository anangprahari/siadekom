<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|min:2',
            'username' => 'required|string|min:4|max:25|alpha_dash:ascii|unique:users,username',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string|min:6|confirmed', 
            'password_confirmation' => 'required|string|min:6', 
        ];
    }

    /**
     * Get custom validation messages
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama minimal 2 karakter.',
            'name.max' => 'Nama maksimal 50 karakter.',

            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 4 karakter.',
            'username.max' => 'Username maksimal 25 karakter.',
            'username.alpha_dash' => 'Username hanya boleh mengandung huruf, angka, dash, dan underscore.',
            'username.unique' => 'Username sudah digunakan.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 50 karakter.',
            'email.unique' => 'Email sudah terdaftar.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',

            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            'password_confirmation.min' => 'Konfirmasi password minimal 6 karakter.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Auto-generate username jika kosong
        if (empty($this->username) && !empty($this->name)) {
            $this->merge([
                'username' => $this->generateUsernameFromName($this->name)
            ]);
        }

        // Clean username
        if ($this->username) {
            $this->merge([
                'username' => strtolower(trim($this->username))
            ]);
        }
    }

    /**
     * Generate username from name
     */
    private function generateUsernameFromName($name)
    {
        $base = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $name));
        $base = preg_replace('/_{2,}/', '_', $base);
        $base = trim($base, '_');

        if (strlen($base) < 4) {
            $base = $base . '_user';
        }

        return substr($base, 0, 25); // Limit to 25 characters
    }
}
