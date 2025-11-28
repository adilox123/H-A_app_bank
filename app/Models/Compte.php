<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compte extends Model
{
    use SoftDeletes;

    protected $fillable = ['rib', 'solde', 'user_id'];

    // Un compte appartient à un utilisateur (client)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Virements émis par ce compte
    public function virementsEmis()
    {
        return $this->hasMany(Virement::class, 'compte_emetteur_id');
    }

    // Virements reçus par ce compte
    public function virementsRecus()
    {
        return $this->hasMany(Virement::class, 'compte_recepteur_id');
    }

    /**
     * Retourne tous les virements liés à ce compte (émis et reçus)
     * ⚠️ Attention : ceci retourne une collection, pas une relation Eloquent
     */
    public function transactions()
{
    return $this->virementsEmis->merge($this->virementsRecus)->sortByDesc('created_at');
}

}
