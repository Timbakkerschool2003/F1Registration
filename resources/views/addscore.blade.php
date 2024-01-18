@extends('layouts.app')

@section('content')
    <h2>Add Score</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('addscore.store') }}">
        @csrf

        <label for="user_id">User:</label>
        <select name="users_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="time">Time:</label>
        <input type="text" name="time" id="time">

        <label for="teams_id">Team:</label>
        <select name="teams_id" id="teams_id">
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>

        <label for="circuits_id">Circuit:</label>
        <select name="circuits_id" id="circuit_id">
            @foreach($circuits as $circuit)
                <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
            @endforeach
        </select>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date">

        <button type="submit">Submit</button>
    </form>
@endsection
