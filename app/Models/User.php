<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Mutator untuk auto-generate username jika kosong
     */
    public function setUsernameAttribute($value)
    {
        if (empty($value) && !empty($this->name)) {
            $this->attributes['username'] = $this->generateUniqueUsername($this->name);
        } else {
            $this->attributes['username'] = $value;
        }
    }

    /**
     * Generate unique username from name
     */
    private function generateUniqueUsername($name)
    {
        $base = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $name));
        $base = preg_replace('/_{2,}/', '_', $base);
        $base = trim($base, '_');

        if (strlen($base) < 4) {
            $base = $base . '_user';
        }

        $base = substr($base, 0, 25);

        $username = $base;
        $counter = 1;

        while (self::where('username', $username)->exists()) {
            $suffix = '_' . $counter;
            $maxBaseLength = 25 - strlen($suffix);
            $username = substr($base, 0, $maxBaseLength) . $suffix;
            $counter++;
        }

        return $username;
    }

    /**
     * Get user's initials for avatar placeholder
     */
    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
            if (strlen($initials) >= 2) break;
        }

        return $initials ?: 'U';
    }
}
