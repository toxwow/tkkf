<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'information', 'league_id', 'capitan'];

    public function league()
    {
        return $this->belongsTo('App\League');
    }
    
    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
