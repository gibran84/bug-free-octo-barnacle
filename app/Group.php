<?php



namespace App;



class Group extends Model
{
    
    public function place()
    {
        
        return $this->belongsTo(Place::class);
        
    }
    
}
