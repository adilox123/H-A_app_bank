<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom', 'prenom', 'email', 'name']; // <-- champ 'name' ajouté si utilisé

    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}
