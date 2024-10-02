<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{

    protected $table = 'password_reset_tokens';

    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

    public $casts = [
        'token' => 'hashed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function isExpired()
    {
        return $this->created_at < now()->subMinutes(10);
    }

    public function isValid(string $token)
    {
        return Hash::check($token, $this->token);
    }

    public function use(string $token)
    {
        if($this->isValid($token) && !$this->isExpired()) {
            $this->delete();
            return true;
        }
        $this->delete();
        return false;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
      return $date->format(config('panel.datetime_format'));
    }
}
