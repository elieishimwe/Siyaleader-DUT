<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CaseNote extends Eloquent
{


    protected $table    = 'caseNotes';
    protected $fillable = ['caseId','user','note','active'];



}
