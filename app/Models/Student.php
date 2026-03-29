<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'nombre_hifz',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function halaqas()
    {
        return $this->belongsToMany(Halaqa::class, 'memberships', 'student_id', 'halaqa_id');
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'participations', 'student_id', 'competition_id');
    }

}
