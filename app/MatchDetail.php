<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchDetail extends Model
{
    protected $fillable = [ 'match_id', 'set', 'home_points', 'enemy_points', 'id'];
}
