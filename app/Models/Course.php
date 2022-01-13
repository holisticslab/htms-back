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
        'course_link',
        'course_image',
        'max_student'
    ];

    public function trainings() {
        return $this->hasMany(Training::class, 'course_id');
    }
}
