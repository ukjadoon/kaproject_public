<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_client')->withTimestamps();
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_client')->withTimestamps();
    }
}
