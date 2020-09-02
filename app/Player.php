<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'surname', 'photo', 'team_id', 'user_id' ,'birth', 'status'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
