@extends('layouts.app')
@section('title', 'Events')
@section('content')

@if (count($events)>0)
<div class="row">
    @foreach ($events as $event)
    
        <div class="col m-2">
            <div class="card" style="width: 18rem;">
                <img src="{{asset($event->picture)}}" class="card-img-top" alt="{{$event->event_name}}">
                <div class="card-body">
                  <h5 class="card-title">{{$event->event_name}}</h5>
                  <p class="card-text">{{$event->description}}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>  
        </div>
    
         
    @endforeach
</div>
@endif
@endsection