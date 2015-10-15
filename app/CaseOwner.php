<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CaseOwner extends Eloquent
{


    protected $table    = 'case_owners';
    protected $fillable = ['case_id','user','type','active'];

}
