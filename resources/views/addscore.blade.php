@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Score</h2>
        <form method="post" action="{{ route('create') }}">
            @csrf
            <div class="form-group">
                <label for="time">Tijd:</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <div class="form-group">
                <label for="team_name">Teamnaam:</label>
                <select class="form-control" id="team_name" name="team_name" required>
                    <option value="-1" selected>Selecteer Team</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="circuit_name">Circuit:</label> <!-- Verander naar circuit_name -->
                <select class="form-control" id="circuit_name" name="circuit_name" required>
                    <option value="-1" selected>Selecteer Circuit</option>
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
