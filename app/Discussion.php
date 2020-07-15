<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Discussion extends Model
{
    protected $fillable=['title','content','channel_id','slug','user_id'];
    public function channel(){

        return $this->belongsTo(Channel::class);

    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function replies(){

        return $this->hasMany(Reply::class);

    }
    public function watchers(){
        return $this->hasMany(Watcher::class);
    }

    public function is_being_watch_by_auth_user(){

        $id=Auth::id();

        $watchers=array();

        foreach ($this->watchers as $watcher):

            array_push($watchers,$watcher->user->id);

        endforeach;

        if(in_array($id,$watchers)){

            return true;

        }
        else{

            return false;
        }

    }
    public function has_best_answer(){


        $result=false;
        foreach ($this->replies as $reply){

            if($reply->best_answer){

                $result=true;

                break;
            }

        }

       // dd($result);

        return $result;




    }
}
