<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['name'];

    public function team()
    {
        return $this->hasMany('App\Team');
    }

    public function matches()
    {
        return $this->hasMany('App\Match')->orderBy('date');
    }
}
