<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Ship extends Eloquent
{


   protected $table    = 'ships';
   protected $fillable = ['shipName','shipGPS','shipHeading','shipImg_url','active'];



}

