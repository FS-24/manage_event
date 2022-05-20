<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    
    /**
     * index return event form view
     *
     * @return event form view
     */
    public function index(){
        return view('eventform');
    }
    
    /**
     * store add event to the DB
     *
     * @param  Request $request
     * @return void
     */
    public function store(Request $request){
        
       /*   $request->validate([
            'event_name'=>['required', Rule::unique('events','event_name')],
            'event_date'=>'required',
            'event_picture'=>'file|mimes:png,jpg'
        ]); */

        $messages = [
            'event_name.required' => 'Nous voulons le nom de l\'événement!',
        ];
      $validator = Validator::Make($request->all(),[
          'event_name'=>'required',
          'event_date'=>'required',
          'event_picture'=>'file|mimes:png,jpg'
          
      ], $messages,  [
        'event_name' => 'Nom de l\'événement',
    ]);

        $validator->validate();
        $path = $request->file('event_picture')->store('public/img','public');
            $event = new Event();
            $event->event_name = $request->event_name;
            $event->description = $request->event_desc;
            $event->event_date = $request->event_date;
            $event->picture = 'storage/'.$path;
            $event->save();
            return redirect('/')->with('status', 'Event Added with success!');
    }

    public function all(){
        $events = Event::all();
        return view('events',["events"=>$events]);
    }
}