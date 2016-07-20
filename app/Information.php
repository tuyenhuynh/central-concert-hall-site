<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected  $fillabe =  ['phone_number', 'company_info', 'hall_schema', 'hall_text', 'ceo_text'];
}
