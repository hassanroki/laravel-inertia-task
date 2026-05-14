<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailOtp extends Model
{
    // protected
    protected $fillable = [
        'user_id',
        'otp',
        'expires_at'
    ];

    protected $cast = [
        'expires_at' => 'datetime',
    ];

    // check otp expires or not
    public function isExpired(): bool
    {
        return now()->greaterThan($this->expires_at);
    }
}
