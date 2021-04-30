<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'to_user_id'];

    //User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
