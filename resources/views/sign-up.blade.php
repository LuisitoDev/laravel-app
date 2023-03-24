@extends('app')

@section('content')
<div class="row gx-0">
    <div class="col-6 mx-auto my-4 p-4 border">
        <h1>Sign Up</h1>
        <form method="post" action="{{route('signUp')}}">
            @csrf
            <div class="row py-4">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name')}}">
                    @error("name")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="text" class="form-control" id="emailInput" name="email" value="{{old('email')}}">
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
                <div class="mb-3">
                    <label for="birthdayInput" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthdayInput" name="birthday" value="{{old('birthday')}}"/>
                    @error("birthday")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="profileInput" class="form-label">Profile</label>
                    <select name="profile" id="profileInput" class="form-select" >
                        @foreach ($profilesList as $profile)
                            <option value="{{ $profile->id }}" @if ($profile->id == old('profile')) selected @endif>{{ $profile->name }}</option>
                        @endforeach
                    </select>

                    @error("profile")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>



                <button type="submit" class="btn btn-primary col-3 mx-auto mt-2">Sign up</button>
            </div>

        </form>
    </div>
</div>
@endsection