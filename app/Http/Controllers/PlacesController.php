<?php

namespace App\Http\Controllers;

use App\Place;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Repositories\Places;

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
                
            ]
            
        ]);
        
        return view('places.index', compact('places'));
    }

    public function show(Place $place)
    {
        return view('places.show', compact('place'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('places.edit', compact('place'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        
        $this->validate(request(), [
            
            'name' => 'required'
            
        ]);
        
        $dateTime = new \DateTime();
        
        $place->update([
            
            'name' => \request('name'),
            
            'updated_at' => $dateTime->format('Y-m-d H:i:s')
            
        ]);
        
        return redirect('/places');
        
    }

    public function create()
    {
        return view('places.create');
    }

    public function store()
    {
        $this->validate(request(), [

           'name' => 'required'

        ]);

        $dateTime = new \DateTime();

        Place::create([
            
            'user_id' => auth()->user()->id,

            'name' => \request('name'),
            
            'created_at' => $dateTime->format('Y-m-d H:i:s'),

            'updated_at' => $dateTime->format('Y-m-d H:i:s')

        ]);

        return redirect('/places');
    }
}
