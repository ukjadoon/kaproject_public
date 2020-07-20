<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_city')->withTimestamps();
    }
}
