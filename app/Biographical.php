<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biographical extends Model
{
    public $fillable = [
    					'social_security_no',
    					'surname',
    					'date_of_birth',
    					'marital_status',
    					'region',
    					'monthly_salary'
    					];
}
