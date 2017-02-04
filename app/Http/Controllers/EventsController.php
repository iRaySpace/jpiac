<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    /**
     * Create an instance
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('events.home')->with('events', Event::all());
    }

    public function create()
    {
    	return view('events.create');
    }

    public function show($id)
    {
    	return view('events.show')->with('event', Event::where('id', $id)->first());
    }

    public function store()
    {	
		// // create a new event instance
		// $event = new Event;

		// // get the post request
		// $event->name = request('name');
		// $event->description = request('description');

		// // save to database
		// $event->save();

    	Event::create([
    		'title' => request('name'),
    		'description' => request('description'),
    		'date_occurred' => request('date')
    	]);

    	// redirect
    	return redirect('/events');

    }

    public function destroy($event)
    {
    	$event = Event::find($event);

    	// delete the event
    	$event->delete();

    	// redirect
    	return redirect('/events');

    }
}