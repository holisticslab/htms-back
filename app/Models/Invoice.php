<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'cohort_id',
        'company_id',
        'invoice_num',
        'invoice_date',
        'invoice_due',
        'invoice_amount'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

}
