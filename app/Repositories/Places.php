<?php 


namespace App\Repositories;



use App\Place;

class Places

{
    
    public static function all($options = [])
    
    {
        
        if (!empty($options))
            
        {
            
            if (isset($options['orderBy'])) 
                
            {
                foreach ($options['orderBy'] as $key => $orderBy)
                    
                {
                    
                    Place::orderBy($key, $orderBy);
                    
                }
                
            }
            
            
        }
        
        
        $places = Place::query()->get();
        
        
        
        return $places;
        
    }
    
}