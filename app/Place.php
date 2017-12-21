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
    
    public static function toCombo()
    {
        $places = Place::orderBy('name', 'asc')->get();
        
        $combo = [];
        
        foreach ($places as $place)
        {
            $combo[$place->id] = $place->name;
        }
        
        return $combo;
    }
    
    public function users()
    {
        
        return $this->belongsToMany(User::class);
        
    }
    
}
