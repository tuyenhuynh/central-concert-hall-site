<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected  $fillable=['name', 'date_time', 'description', 'audio_path', 'photo_path', 'audience_count', 'purchase_code'];

    public function photo() {

        return $this->belongsTo('App\Photo');
        
    }
}
