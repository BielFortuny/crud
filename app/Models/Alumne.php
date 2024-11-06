<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'cognoms', 'data_naixement', 'centre_id', 'ensenyament_id'];

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }

    public function ensenyament()
    {
        return $this->belongsTo(Ensenyament::class);
    }
}
