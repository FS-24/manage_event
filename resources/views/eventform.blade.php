@extends("layouts.app")

@section('title', 'New')
@section('content')
    <div class="card my-3 w-70 mx-auto shadow ">
        <div class="card-header  text-center">
            <h1>Add Event</h1>
        </div>
        <div class="card-body">
            <form action="/" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group m-2">
                    <label for="name" class="form-label">Event Name</label>
                    <input type="text" class="form-control" name="event_name" id="name"/>
                </div>
                
                <div class="form-group m-2">
                    <label for="desc"class="form-label">Event Description</label>
                    <textarea class="form-control" name="event_desc" id="desc">

                    </textarea>
                </div> 
                
                <div class="form-group m-2">
                    <label for="date" class="form-label">Event Date</label>
                    <input type="date" name="event_date" id="date" class="form-control">
                </div>   
                
                <div class="form-group m-2">
                    <label for="pic" class="form-label">Upload picture</label>
                    <input type="file" name="event_picture" id="pic" class="form-control">
                </div>
                <input type="reset" value="Reset" class="btn btn-warning btn-md float-end m-2"/>
                <button class="btn btn-primary btn-md float-end m-2"> <i class="bi bi-plus"></i> Save</button>
                 
            </form>
        </div>
    </div>
    <div>
        @if (isset($event))
            <h1> {{$event->event_name}}</h1>
            <p> {{$event->description}}</p>
            <em> {{$event->event_date}}</em>
        @endif
    </div>
@endsection

