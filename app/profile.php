<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable=['title','description','url','image'];
    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/TJ7YuSjxRXDHEAlMRKoOYf1TlyhHNLvYmaKif6gm.jpeg';
        return '/storage/' . $imagePath;
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
