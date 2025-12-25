<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'name',
        'phone'
    ];

    public function phoneAnalysis(): HasOne
    {
        return $this->hasOne(PhoneAnalysis::class);
    }
}
