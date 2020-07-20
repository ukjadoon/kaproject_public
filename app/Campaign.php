<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function cities()
    {
        return $this->belongsToMany(City::class, 'campaign_city')->withTimestamps();
    }
}
