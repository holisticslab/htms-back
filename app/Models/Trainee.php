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
        'training_id',
        'trainee_name',
        'trainee_ic',
        'trainee_phoneno',
        'trainee_email',
        'company_id',
        'training_participate',
        'trainee_status',
        'trainer_payment',
        'allergies',
        'referrer_code',
        'promo_code',
        'hrdc_status'
    ];

    public function training() {
        return $this->belongsTo(Training::class);
    }
}
