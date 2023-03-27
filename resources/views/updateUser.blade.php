@extends('app')

@section('content')
<div class="row gx-0">
    <div class="col-6 mx-auto my-4 p-4 border">
        <h1>User</h1>
        <form method="post" action="{{route('updateUser')}}">
            @csrf
            @method('put')
            <div class="row py-4">
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nameInput" name="name" value="{{old('name') != null ? old('name') : $user->name}}">
                    @error("name")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="birthdayInput" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthdayInput" name="birthday" value="{{old('birthday') != null ? old('birthday') : $user->employee->birthday}}"/>
                    @error("birthday")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="profileInput" class="form-label">Profile</label>
                    <select name="profile" id="profileInput" class="form-select" >
                        @foreach ($profilesList as $profile)
                            <option value="{{ $profile->id }}" 
                                @if (old('profile') != null)
                                    @if ($profile->id == (old('profile')))
                                    selected
                                    @endif
                                @else
                                    @if ($profile->id == $user->profile_id ) 
                                        selected
                                    @endif
                                @endif
                            >{{ $profile->name }}</option>
                        @endforeach
                    </select>

                    @error("profile")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror

                    <input type="hidden" id="idInput" name="id" value="{{$user->id}}">
                    @error("id")
                    <h6 class="text-danger">{{$message}}</h6>    
                    @enderror
                </div>



                <button type="submit" class="btn btn-primary col-3 mx-auto mt-2">Update</button>
            </div>

        </form>

        <div class="h4 pb-2 mb-4 border-bottom border-secondary">
        </div>

        <h2>Delete account information</h2>
        
        <div class="row">
            <button class="btn btn-danger delete col-3 mt-2 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
        </div>

        <form method="post" action="{{route('deleteUser')}}">
            @csrf
            @method("delete")

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Are you sure you want to delete this account</h6>
                            <p>The account will be permanently deleted and all the information will be ereased</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route("deleteProfile")}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <input type="hidden" name="id" value="{{$user->id}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        
        
    </div>
</div>
@endsection