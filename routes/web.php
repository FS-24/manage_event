<?php

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('eventform');
});

Route::post('/', function(Request $request){
    $path = $request->file('event_picture')->store('public/img','public');
    // echo $path;
        $event = new Event();
        $event->event_name = $request->event_name;
        $event->description = $request->event_desc;
        $event->event_date = $request->event_date;
        $event->picture = 'storage/'.$path;
        $event->save();
        return view('eventform',["event"=>$event]);
});

Route::get('/events', function(){
    $events = Event::all();
    return view('events',["events"=>$events]);
});