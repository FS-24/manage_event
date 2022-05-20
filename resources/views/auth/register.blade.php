@extends("layouts.app")

@section('title', 'Register')
@section('content')
    <div class="card my-3 w-70 mx-auto shadow ">
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
        <div class="card-header  text-center">
            <h1>Register User</h1>
        </div>
        <div class="card-body">
            <form action="/register"  method="POST">
                @csrf
                <div class="form-group m-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="name"/>
                    @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group m-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email"/>
                    @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group m-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" id="password"/>
                    @error('password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                  <div class="form-group m-2">
                    <label for="c_password" class="form-label">Password Confirm</label>
                    <input type="password" class="form-control @error('c_password') is-invalid @enderror" name="c_password" value="{{old('password')}}" id="c_password"/>
                    @error('c_password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
               
              
                <input type="reset" value="Reset" class="btn btn-warning btn-md float-end m-2"/>
                <button class="btn btn-primary btn-md float-end m-2"> <i class="bi bi-plus"></i> Save</button>
                 
            </form>
        </div>
    </div>
    
@endsection
