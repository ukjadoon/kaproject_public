<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['code', 'name', 'description', 'google_tag', 'facebook_pixel', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'campaign_client')->withTimestamps();
    }
}
