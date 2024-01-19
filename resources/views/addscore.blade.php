@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Voeg Score toe</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('addscore.store') }}">
            @csrf

            <div class="form-group">
                <label for="user_id">Coureur:</label>
                <select name="users_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="time">Tijd:</label>
                <input type="text" name="time" id="time" class="form-control">
            </div>

            <div class="form-group">
                <label for="teams_id">Team:</label>
                <select name="teams_id" id="teams_id" class="form-control">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="circuits_id">Circuit:</label>
                <select name="circuits_id" id="circuit_id" class="form-control">
                    @foreach($circuits as $circuit)
                        <option value="{{ $circuit->id }}">{{ $circuit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection
