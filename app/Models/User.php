<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $dates = ['tanggal_lahir' => 'datetime:Y-m-d'];
    protected $fillable = [
        'id', 'nip', 'no_ktp', 'username', 'melamar_sebagai' . 'level', 'email', 'password', 'confirm_password', 'satker', 'image', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        if (!$this->image) {
            return asset('images/default.jpg');
        }
        return asset('pelamar/images/' . $this->image);
    }

    public function biodata()
    {
        return $this->hasOne('App\Models\Biodata');
    }
}
