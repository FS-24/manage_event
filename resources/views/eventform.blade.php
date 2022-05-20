@extends("layouts.app")

@section('title', 'New')
@section('content')
    <div class="card my-3 w-70 mx-auto shadow ">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
        <div class="card-header  text-center">
            <h1>Add Event</h1>
        </div>
        <div class="card-body">
            <form action="/" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group m-2">
                    <label for="name" class="form-label">Event Name</label>
                    <input type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" value="{{old('event_name')}}" id="name"/>
                    @error('event_name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group m-2">
                    <label for="desc"class="form-label">Event Description</label>
                    <textarea class="form-control" placeholder="Give us a little description." name="event_desc" id="desc">{{old('event_desc')}}</textarea>
                </div> 
                
                <div class="form-group m-2">
                    <label for="date" class="form-label">Event Date</label>
                    <input type="date" name="event_date" id="date" class="form-control @error('event_date') is-invalid @enderror" value="{{old('event_date')}}">
                    @error('event_date')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>   
                
                <div class="form-group m-2">
                    <label for="pic" class="form-label">Upload picture</label>
                    <input type="file" name="event_picture" id="pic" class="form-control @error('event_picture') is-invalid @enderror" value="{{old('event_picture')}}">
                    @error('event_picture')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
                </div>
                <input type="reset" value="Reset" class="btn btn-warning btn-md float-end m-2"/>
                <button class="btn btn-primary btn-md float-end m-2"> <i class="bi bi-plus"></i> Save</button>
                 
            </form>
        </div>
    </div>
    
@endsection

