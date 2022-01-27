<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;
    protected $table = 'trainees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cohort_id',
        'trainee_name',
        'trainee_ic',
        'trainee_phoneno',
        'trainee_email',
        'company_id',
        'cohort_participate',
        'trainee_status',
        'trainer_payment',
        'allergies',
        'referrer_code',
        'promo_code',
        'hrdc_status'
    ];

    // public function cohort() {
    //     return $this->belongsTo(Cohort::class);
    // }
}
