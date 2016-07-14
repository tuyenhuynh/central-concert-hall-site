<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected  $fillable=['name', 'time', 'date', 'description', 'audio_id', 'photo_id', 'audience_count'];

    
}
