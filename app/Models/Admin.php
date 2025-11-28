<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = ['nom', 'prenom', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // Relation vers tous les clients qu'il gère
    public function clients()
    {
        return $this->hasMany(Client::class, 'user_id');
    }

    // Relation vers tous les comptes qu'il gère directement (optionnel)
    public function comptes()
    {
        return $this->hasMany(Compte::class, 'user_id');
    }
}