<?php



namespace App;



class Group extends Model
{
    
    public function place()
    {
        
        return $this->belongsTo(Place::class);
        
    }
    
    public function user()
    {
        
        return $this->belongsTo(User::class);        
        
    }
    
}
