@extends('app')

@section('content')
<div class="row gx-0">
    <div class="col-4 mx-auto my-4 p-4 border">
        <h1>Login</h1>        
        <form method="post" action="{{route('login')}}">
            @csrf
            <div class="row py-4">
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email">
                    @error("email")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password">
                    @error("password")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>
                @error("loginFail")
                <div class="mb-3">
                    <h6 class="alert alert-danger">{{$message}}</h6>  
                </div>
                @enderror
                <button type="submit" class="btn btn-primary col-3 mx-auto mt-2">Login</button>
            </div>
        </form>
        
    </div>
</div>
@endsection