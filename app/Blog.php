<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'user_id', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
