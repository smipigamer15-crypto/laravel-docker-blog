<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable; // Правильний базовий клас
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * Атрибути, які можна масово заповнювати.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Атрибути, які мають бути приховані для масивів.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Атрибути, які мають бути типізовані.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}

