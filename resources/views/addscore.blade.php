@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Score</h2>
        <form method="post" action="{{ route('scoreboard.store') }}">
            @csrf
            <div class="form-group">
                <label for="driver_name">Driver Name:</label>
                <input type="text" class="form-control" id="driver_name" name="driver_name" required>
            </div>

            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <div class="form-group">
                <label for="team_name">Team Name:</label>
                <select class="form-control" id="team_name" name="team_name" required>
                    <option value="-1" selected>Select Team</option> <!-- Standaardoptie -->
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="circuit">Circuit:</label>
                <input type="text" class="form-control" id="circuit" name="circuit" required>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
