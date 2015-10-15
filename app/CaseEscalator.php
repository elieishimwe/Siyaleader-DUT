<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CaseEscalator extends Eloquent
{


    protected $table    = 'CaseEscalations';
    protected $fillable = ['caseId','user','type','active','message'];

}
