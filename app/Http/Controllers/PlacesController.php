<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use App\Repositories\Places;
use App\Http\Requests\PlaceForm;
use Illuminate\Auth\Access\Gate;

class PlacesController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $places = Places::all([
            
            'orderBy' => [
                
                'name' => 'asc'
                
            ],
            
            'paginate' => 10
            
        ]);
        
        return view('places.index', compact('places'));
    }

    public function show(Place $place)
    {
        
        if (auth()->user()->cant('showPlace', $place)) {
            
            throw new \Exception(config('constants.DENIED'));
            
        }
        
        return view('places.show', compact('place'));
    }
    
    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request, PlaceForm $placeForm)
    {
        $placeForm->persist();
        
        session()->flash('message', config('constants.STORED'));

        return redirect('/places');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        if (\Gate::denies('update-place', $place)) {
            
            throw new \Exception(config('constants.DENIED'));
            
        }
        
        return view('places.edit', compact('place'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlaceForm $placeForm, Place $place)
    {
        
        $placeForm->place = $place;
        
        $placeForm->persist();
        
        session()->flash('message', config('constants.UPDATED'));
        
        return redirect('/places');
        
    }
}
