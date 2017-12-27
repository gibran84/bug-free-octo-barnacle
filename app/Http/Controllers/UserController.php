<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users;
use App\User;
use App\Place;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data            
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all([
            
            'orderBy' => [
                
                'name' => 'asc'
            
            ]
        
        ]);
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::pluck('name', 'id')->all();
        
        return view('users.create', compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        \DB::transaction(function () {
            
            $portrait = request()->file('portrait');
            
            $user = User::create([
                'name' => \request('name'),
                'email' => \request('email'),
                'password' => bcrypt(\request('password')),
                'portrait' => $portrait
            ]);
            
            foreach (\request('places') as $placeId) {
                
                $place = Place::find($placeId);
                
                $user->places()->attach($place);
            }
            
        });
            
        
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $filename = storage_path('app/public/' . $user->portrait);
        
        $im = @imagecreatefromjpeg($filename);
        
        
        if (!$im) {
            
            echo "no se encuentra";
            
        }
        
        $type = 'jpeg';
        
        $data = file_get_contents($filename);
        $base64Portrait = 'data:image/' . $type . ';base64,' . base64_encode($data);
        
        return view('users.show', compact('user', 'base64Portrait'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $places = Place::pluck('name', 'id')->all();
        
        return view('users.edit', compact('places', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        \DB::transaction(function ($user) use ($user) {
            
            $portrait = \request()->file('portrait')->store('public');
            
            $portrait = explode('/', $portrait);
            
            $user->update([
                'name' => \request('name'),
                'email' => \request('email'),
                'portrait' => $portrait[1]
            ]);
            
            $user->places()->sync(\request('places'));
            
        });
        
        session()->flash('message', config('constants.UPDATED'));
        
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
