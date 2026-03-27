<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaqa extends Model
{
    /** @use HasFactory<\Database\Factories\HalaqaFactory> */
    use HasFactory;

    protected $fillable = [
        'nom_halaqa',
        'capacite',
        'cheikh_id'
    ];

    public function cheikh()
    {
        return $this->belongsTo(User::class, 'cheikh_id');
    }
}
