<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Place;

class GroupsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('sayemail')->only(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
//         $groups = Group::orderBy('name', 'asc')->get();
        
        $query = Group::with('place');
        
        $groups = $query->get();
        
        
        foreach ($groups as $group)
        {
            
            $place = $group->getRelation('place');
            
        }
        
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comboPlaces = Place::toCombo();
        
        return view('groups.create', compact('group', 'comboPlaces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            
            'name' => 'required|unique:groups|max:50',
            
            'place_id' => 'required'
            
        ]);
        
        $dateTime = new \DateTime();
        
        Group::create([
            
            'user_id' => auth()->user()->id,
            
            'place_id' => \request('place_id'),
            
            'name' => \request('name'),
            
            'created_at' => $dateTime->format('Y-m-d H:i:s'),
            
            'updated_at' => $dateTime->format('Y-m-d H:i:s')
            
        ]);
        
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        
        $comboPlaces = Place::toCombo();
        
        
        return view('groups.edit', compact('group', 'comboPlaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate(request(), [
            
            'name' => 'required',
            
            'place_id' => 'required'
            
        ]);
        
        $dateTime = new \DateTime();
        
        $group->update([
            
            'name' => \request('name'),
            
            'place_id' => \request('place_id'),
            
            'updated_at' => $dateTime->format('Y-m-d H:i:s')
            
        ]);
        
        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
