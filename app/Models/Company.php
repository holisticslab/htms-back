<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';
    protected $fillable = [
        'company_name',
        'company_register_no',
        'company_type',
        'company_branch',
        'company_details',
        'company_address',
    ];

    // public function invoice()
    // {
    //     return $this->hasMany(Invoice::class);
    // }
}
