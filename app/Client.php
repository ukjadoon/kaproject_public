<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'homepage_url', 'about', 'contact_number', 'typeform_survey_code', 'typeform_chatbot_code', 'type'];

    public const TYPE_REDIRECT = 0;
    public const TYPE_FORM = 1;

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_client')->withTimestamps();
    }

    public function municipalities()
    {
        return $this->belongsToMany(Municipality::class, 'client_municipality')->withTimestamps();
    }

    public function logo()
    {
        return $this->hasOne(Logo::class);
    }
}
