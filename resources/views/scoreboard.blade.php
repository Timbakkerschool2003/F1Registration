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
                                <th scope="col">Coureur</th>
                                <th scope="col">Tijd</th>
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
                        <div class="text-center mb-4">
                            <canvas id="scoreChart" height="100"></canvas> <!-- Aangepaste hoogte -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var scores = @json($scoreboards);

            var dates = scores.map(function (score) {
                return score.date;
            });

            var times = scores.map(function (score) {
                return score.time;
            });

            var ctx = document.getElementById('scoreChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Tijd',
                        data: times,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        setInterval(function() {
            location.reload();
        }, 15000);
    </script>
@endsection
