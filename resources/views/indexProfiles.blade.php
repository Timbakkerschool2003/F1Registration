<!-- resources/views/indexprofiles.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($users as $user)
            <div class="card mb-3" style="background-color: #e10600; color: #000000;">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('editProfile', $user->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('destroyUser', $user->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
