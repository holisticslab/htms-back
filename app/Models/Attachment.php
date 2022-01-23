<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'attach_name',
        'attach_desc',
        'attach_type',
        'attach_file'
    ];
}
