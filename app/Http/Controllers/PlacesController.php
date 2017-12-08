<?php

namespace App\Http\Controllers;

use App\Place;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function index()
    {
        $places = Place::all();

        return view('places.index', compact('places'));
    }

    public function show(Place $place)
    {
        return view('places.show', compact('place'));
    }

    public function create()
    {
        return view('places.create');
    }

    public function store()
    {
        $dateTime = new \DateTime();

        Place::create([

            'name' => \request('name'),

            'created_at' => $dateTime->format('Y-m-d H:i:s'),

            'updated_at' => $dateTime->format('Y-m-d H:i:s')

        ]);

        return redirect('/places');
    }
}
