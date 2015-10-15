<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CaseFile extends Eloquent
{


    protected $table    = 'caseFiles';
    protected $fillable = ['caseId','user','file','active','addressbook','fileNote'];



}
