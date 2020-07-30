<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['code', 'name', 'description', 'google_tag', 'facebook_pixel', 'city_id'];

    public function municipalities()
    {
        return $this->belongsToMany(Municipality::class, 'campaign_municipality')->withTimestamps();
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'campaign_client')->withTimestamps();
    }
}
