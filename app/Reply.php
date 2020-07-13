<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=['content','discussion_id','user_id','best_answer'];

    public function discussion(){

        return $this->belongsTo(Discussion::class);

    }

    public function user(){


        return $this->belongsTo(User::class);

    }


}
