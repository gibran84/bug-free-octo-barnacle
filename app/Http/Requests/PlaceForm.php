<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use App\Place;

class PlaceForm extends FormRequest
{

    public $place;

    function __construct(Place $place)
    {
        $this->place = $place;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name' => 'required'
        
        ];
    }

    public function persist()
    {
        $carbon = new Carbon();
        
        if (is_null($this->place->id)) {
            
            Place::create([
                
                'user_id' => auth()->user()->id,
                
                'name' => \request('name'),
                
                'created_at' => $carbon->format('Y-m-d H:i:s'),
                
                'updated_at' => $carbon->format('Y-m-d H:i:s')
            
            ]);
        } else {
            
            $this->place->update([
                
                'name' => \request('name'),
                
                'updated_at' => $carbon->format('Y-m-d H:i:s')
            
            ]);
        }
    }
}
