@extends('layouts.app')

@section('content')
    <body style="background-image: url('/images/background.jpg'); background-size: cover; background-repeat: no-repeat;">

    <div class="container">
        <div class="col-md-12 mt-3">
            <div class="card border">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2>Scoreboard</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="scoreboardTable">
                            <thead>
                            <tr>
                                <th scope="col">Driver Name</th>
                                <th scope="col">Time</th>
                                <th scope="col">Team</th>
                                <th scope="col">Circuit</th>
                                <th scope="col">Datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scoreboards as $scoreboard)
                                <tr>
                                    <td>{{ $scoreboard->driver_name }}</td>
                                    <td>{{ $scoreboard->time }}</td>
                                    <td>{{ $scoreboard->team_name }}</td>
                                    <td>{{ $scoreboard->circuit_name }}</td>
                                    <td>{{ $scoreboard->date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setInterval(function() {
            location.reload();
        }, 15000);
    </script>
@endsection
