<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['league_id', 'home_team_id', 'enemy_team_id', 'status', 'home_team_score', 'enemy_team_score', 'date'];

    public function detail()
    {
        return $this->hasMany('App\MatchDetail');
    }
}
