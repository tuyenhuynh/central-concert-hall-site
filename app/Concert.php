<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected  $fillable=['name', 'date_time', 'description', 'audio_id', 'photo_id', 'audience_count'];

    public function photo() {

        return $this->belongsTo('App\Photo');
        
    }
}
