<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'discount_value',
        'discount_code',
        'discount_desc',
        'discount_start_date',
        'discount_end_date',
        'limit_discount'
    ];
}
