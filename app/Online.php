<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Online extends Eloquent
{

    protected $table      = 'sessions';
    protected $fillable   = ['user_id','last_activity','payload'];
    public    $timestamps = false;


    public function scopeUpdateCurrent($query)
    {

        return $query->where('id', \Session::getId())->update(array(
            'user_id' => \Sentry::check() ? \Sentry::getUser()->id : null
        ));


    }


    public function user()
    {
        return $this->belongsTo('Cartalyst\Sentry\Users\EloquentUser'); # Sentry 3
        // return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User'); # Sentry 2
    }


    public function scopeGuests($query)
    {
        return $query->whereNull('user_id');
    }

    /**
     * Returns all the registered users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRegistered($query)
    {
        return $query->whereNotNull('user_id')->with('user');
    }



}
