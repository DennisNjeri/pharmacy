<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    protected $fillable=['caption','description','image','image2'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
