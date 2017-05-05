<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    public $fillable = [
    					'social_security_no',
    					'claim_no',
    					'claim_date',
    					'total_claimed_amount',
    					];
}
