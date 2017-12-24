<?php

namespace App\Repositories;

use App\Place;

class Places

{

    public static function all($options = [])
    
    {
        $query = Place::query();
        
        if (isset($options['orderBy'])) 
        {
            foreach ($options['orderBy'] as $key => $value) 
            {
                $query->orderBy($key, $value);
            }
        }
        
        
        if (key_exists('paginate', $options)) {
            
            $places = $query->paginate($options['paginate']);
            
        } else {
            
            $places = $query->paginate(config('constants.PAGINATE'));
            
        }
        
        return $places;
    }
}