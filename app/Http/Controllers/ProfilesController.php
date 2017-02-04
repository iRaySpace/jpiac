<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Event;

class ProfilesController extends Controller
{
    /**
     * An instance
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    //
    public function index()
    {
    	return view('profiles.home')->with('profiles', Profile::all());
    }

    public function create()
    {
    	return view('profiles.create');
    }

    public function show($id)
    {
        // pass profile and events (add user to events)
        $data = array(
            'profile' => Profile::where('id', $id)->first(),
            'events'  => Event::all()
        );

        return view('profiles.show')->with($data);

    }

    public function join()
    {
        Profile::find(request('profile_id'))->events()->attach(request('event_id'));

        return redirect('/profiles');
    }

    public function store()
    {

        Profile::create([
            'fname' => request('fname'),
            'lname' => request('lname'),
            'address' => request('address'),
            'twitter_page' => request('twitter_page'),
            'birthday' => request('birthdate')
        ]);

        // redirect
        return redirect('/profiles');

    }
    
    public function destroy($profile)
    {

        $profile = Profile::find($profile);

        $profile->delete();

        return redirect('/profiles');

    }   

}