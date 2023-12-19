@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($profiles as $profile)
            <div class="card mb-3" style="background-color: #e10600; color: #000000;">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{$profile->id}}</th>
                            <td>{{$profile->firstname}}</td>
                            <td>{{$profile->lastname}}</td>
                            <td>{{$profile->mobile}}</td>
                            <td>
                                <a href="edit-profile/{{$profile->id}}" class="btn btn-danger">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
