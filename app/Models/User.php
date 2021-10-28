<?php

namespace App\Models;

use App\Models\Forum;
use App\Models\Messages;
use App\Models\Commentaire;
use App\Models\Publication;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function publications()
    {
        return $this->hasMany(Publication::class);
    }


    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function abonnes()
    {
        return $this->hasMany(Abonne::class);
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function forums(){
        return $this->hasMany(Forum::class);
    }


    /**
     * 
     * 
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'contact',
        'date_de_naissance',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
