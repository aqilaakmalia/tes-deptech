<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Extracurricular extends Model
{
    use HasFactory;

    protected $table = 'extracurriculars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_extracurricular', 'extracurricular_id', 'student_id')
                    ->withPivot('start_year');
    }
}
