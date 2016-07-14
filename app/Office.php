<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected  $fillable=['name', 'address', 'open_at', 'close_at'];
    
}
