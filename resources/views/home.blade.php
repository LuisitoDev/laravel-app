@extends('app')

@section('content')
<div class="row gx-0">
    <div class="col-8 mx-auto my-4 p-4 border">
        <h1>List of employees</h1>
        <div class="table-responsive">
            <table class="table table-lightprimary border-secondary">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Age</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Creation date</th>
                        <th scope="col">Last updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersList as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->profile_name}}</td>
                            <td>{{$user->created_at_format}}</td>
                            <td>{{$user->updated_at_format}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection