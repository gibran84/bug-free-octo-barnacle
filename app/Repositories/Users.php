<?php 


namespace App\Repositories;



use App\User;

class Users

{
    
    public static function all($options = [])
    
    {
        
        if (!empty($options))
            
        {
            
            if (isset($options['orderBy'])) 
                
            {
                foreach ($options['orderBy'] as $key => $orderBy)
                    
                {
                    
                    User::orderBy($key, $orderBy);
                    
                }
                
            }
            
            
        }
        
        
        $users = User::query()->get();
        
        
        
        return $users;
        
    }
    
}