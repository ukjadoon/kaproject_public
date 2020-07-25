<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['code', 'name', 'description', 'google_tag', 'facebook_pixel'];

    public function cities()
    {
        return $this->belongsToMany(City::class, 'campaign_city')->withTimestamps();
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'campaign_client')->withTimestamps();
    }
}
