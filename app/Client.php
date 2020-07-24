<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'homepage_url', 'about'];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_client')->withTimestamps();
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_client')->withTimestamps();
    }

    public function logo()
    {
        return $this->hasOne(Logo::class);
    }
}
