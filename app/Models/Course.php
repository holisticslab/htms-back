<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'course_name',
        'course_desc',
        'course_fee',
        'course_image',
        'max_student'
    ];

    public function cohort() {
        return $this->hasMany(Cohort::class, 'course_id');
    }
}
