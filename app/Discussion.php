<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable=['title','content','channel_id','slug','user_id'];
    public function channel(){

        return $this->belongsTo(Channel::class);

    }
    public function user(){

        return $this->belongsTo(User::class);
    }
}
