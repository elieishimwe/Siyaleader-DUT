<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CaseEscalator extends Eloquent
{


    protected $table    = 'cases_escalations';
    protected $fillable = ['case_is','user','type','active','message'];

}
