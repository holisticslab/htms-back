<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'biller_name',
        'biller_address',
        'biller_phone_no',
        'biller_email',
        'biller_subject',
        'biller_notes'
    ];
}
