@extends('layouts.app')




@section('content')
    <div class="container">
        <h2>Add Score</h2>
        <form method="post" action="{{ route('scoreboard.store') }}">
            @csrf
            <div class="form-group">
                <label for="time">Tijd:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <div class="form-group">
                <label for="team_name">Teamnaam:</label>
                <select class="form-control" id="team_name" name="team_name" required>
                    <option value="-1" selected>Selecteer Team</option> <!-- Standaardoptie -->
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="circuit">Circuit:</label>
                <select class="form-control" id="circuit_name" name="circuit_name" required>
                    <option value="-1" selected>Selecteer Circuit</option> <!-- Standaardoptie -->
                    @foreach($circuit as $cir)
                        <option value="{{ $cir->id }}">{{ $cir->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>

@endsection

