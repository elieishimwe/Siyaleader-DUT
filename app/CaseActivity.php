<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class CaseActivity extends Eloquent
{


    protected $table    = 'caseActivities';
    protected $fillable = ['caseId','user','note','active','addressbook'];



}
