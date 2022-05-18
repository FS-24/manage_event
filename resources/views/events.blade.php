@extends('layouts.app')
@section('title', 'Events')
@section('content')
@if (count($events)>0)
    @foreach ($events as $event)
        <h1>{{$event->event_name}}</h1>
        @if ($event->picture)
        <img src={{asset($event->picture)}} width="50%" alt="{{$event->event_name}}"/>
        @endif
    @endforeach
@endif
@endsection