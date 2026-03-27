<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaqa extends Model
{
    /** @use HasFactory<\Database\Factories\HalaqaFactory> */
    use HasFactory;

    public function cheikh()
    {
        return $this->belongsTo(User::class, 'cheuck_id');
    }
}
