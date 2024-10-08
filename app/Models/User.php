<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTimeInterface;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'fullname',
    ];

    public function getFullnameAttribute()
    {
      return $this->firstname . ' ' . $this->lastname;
    }

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    public function clearPasswordResetTokens()
    {
        PasswordResetToken::where('email', $this->email)->delete();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
      return $date->format(config('panel.datetime_format'));
    }
}
