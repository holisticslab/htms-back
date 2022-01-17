<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'company_id',
        'invoice_num',
        'invoice_date',
        'invoice_desc'
    ];

}
