@extends('app')

@section('content')
    <div class="row gx-0">
        <div class="col-8 mx-auto my-4 p-4 border">
            <h1>List of profiles</h1>
            <div class="table-responsive">
                <a class="btn btn-primary" href="{{ route('showCreateProfile') }}">Add new profile<i class="ms-2 fa fa-plus text-white"></i></a>
                <table class="table table-lightprimary border-secondary mt-3 align-middle">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th scope="col">Actions</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Last updated</th>
                            <th scope="col">Count users</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profilesList as $profile)
                            <tr>
                                <td>
                                    <div>
                                        <a class="btn btn-success" href="{{ route('showUpdateProfile', $profile->id) }}"><i class="fa fa-pen text-white"></i></a>
                                        <button id="" class="btn btn-danger delete" data-id="{{$profile->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash text-white"></i></button>
                                    </div>

                                </td>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->created_at_format }}</td>
                                <td>{{ $profile->updated_at_format }}</td>
                                <td>{{ $profile->countUsers }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @error("id_delete")
                    <h6 class="alert alert-danger">{{$message}}</h6>  
                @enderror
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Are you sure you want to delete this profile</h6>
                    <p>This will delete all the users with this profile</p>
                </div>
                <div class="modal-footer">
                    <form action="{{route("deleteProfile")}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <input type="hidden" id="profile-to-delete" name="id" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click','.delete',function(){
            let id = $(this).attr('data-id');
            $('#profile-to-delete').val(id);
        });
   </script>
@endsection
