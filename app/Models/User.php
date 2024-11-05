<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_AFIL = 'afiliado';
    const ROLE_CLIENTE = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identificationNac',
        'identificationNumber',
        'name',
        'email',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && Storage::disk('avatars')->exists($this->avatar)) {
            return Storage::disk('avatars')->url($this->avatar);
        }

        return asset('noimage.png');
    }

    public function isAdmin()
    {
        if ($this->role !== self::ROLE_ADMIN) {
            return false;
        }

        return true;
    }

    public function isUser()
    {
        if ($this->role !== self::ROLE_USER) {
            return false;
        }

        return true;
    }

    public function isAfil()
    {
        if ($this->role !== self::ROLE_AFIL) {
            return false;
        }

        return true;
    }

    public function isCliente()
    {
        if ($this->role !== self::ROLE_CLIENTE) {
            return false;
        }

        return true;
    }

    public function datosbasicos()
    {
        return $this->hasOne(DatosBasicos::class)->withDefault([
            'cellphone' => '',
            'address' => '',
        ]);
    }    

    public function comercios()
    {
        return $this->hasMany(Comercio::class);
    }    

    public function showUsers()
    {
        if($this->role=='admin')
        {
            return User::all();
        }
        return "0";
    }

    public function showComercios()
    {
        if($this->role=='admin')
        {
            return Comercio::all();
        }
        if($this->role=='afiliado')
        {
            return Comercio::where('user_id', $this->id)->get();
        }
        return "0";
    }

    public function OperacionNoConfirmada()
    {
        return Transaccion::query()
            ->where('id', $this->id)
            ->where('status', 'norevisado')
            ->count();
    }

    public function rol()
    {
        switch ($this->role) {
            case 'admin':
                return 'Administrador';
                break;
            
            case 'afiliado':
                return 'Afiliado';
                break;

            case 'cliente':
                return 'Cliente';
                break;
        }
    }
}
