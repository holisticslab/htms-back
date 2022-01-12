<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'staff_name',
        'staff_ic',
        'staff_email',
        'staff_phoneno',
    ];
}
