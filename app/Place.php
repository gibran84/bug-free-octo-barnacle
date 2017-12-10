<?php



namespace App;


class Place extends Model
{
    
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    
}
