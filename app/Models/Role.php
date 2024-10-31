<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Ici, tu peux ajouter une méthode pour vérifier les permissions
    public function can($permission)
    {
        switch ($this->name) {
            case 'Administrateur':
                return true; // L'admin a tous les droits
            case 'Lecteur':
                return in_array($permission, ['read', 'comment']); // Peut lire et commenter
            case 'Auteur':
                return in_array($permission, ['read', 'create', 'comment']); // Peut lire, créer et commenter
            default:
                return false;
        }
    }
}
