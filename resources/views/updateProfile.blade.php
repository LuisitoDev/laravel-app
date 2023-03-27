@extends('app')

@section('content')
<div class="row gx-0">
    <div class="col-4 mx-auto my-4 p-4 border">
        <h1>Profile</h1>
        <form method="post" action="{{route('updateProfile')}}">
            @csrf
            @method('put')
            <div class="row py-4">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name') != null ? old('name') : $profile->name}}">
                    @error("name")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                    <input type="hidden" id="idInput" name="id" value="{{$profile->id}}">
                    @error("id")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary col-3 mx-auto mt-2">Update</button>
            </div>

        </form>
    </div>
</div>
@endsection