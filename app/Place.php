<?php



namespace App;


class Place extends Model
{
    
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
