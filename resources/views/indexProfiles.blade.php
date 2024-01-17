<!-- resources/views/indexprofiles.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3" style="background-color: #e10600; color: #000000;">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(auth()->check() && auth()->user()->id == $user->id)
                                    <a href="{{ route('editProfile', $user->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('destroyUser', $user->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <a href="{{ route('editPassword') }}" class="btn btn-info">Edit Password</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
