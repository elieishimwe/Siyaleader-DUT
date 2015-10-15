<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CriticalTeam extends Eloquent
{


    protected $table    = 'critical_team';
    protected $fillable = ['user','active'];

}
