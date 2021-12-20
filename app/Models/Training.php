<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'train_place',
        'train_address',
        'train_date_start',
        'train_date_end',
        'train_mode',
        'train_cohort'
    ];
}
