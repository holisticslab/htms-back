<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'cohort_name',
        'cohort_place',
        'cohort_desc',
        'cohort_state',
        'cohort_include',
        'cohort_address',
        'cohort_date_start',
        'cohort_date_end',
        'cohort_mode',
        'cohort_cohort'
    ];

    public function trainess() {
        return $this->hasMany(Trainee::class, 'cohort_id');
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
