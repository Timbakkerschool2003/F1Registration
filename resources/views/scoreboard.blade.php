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
                                <th scope="col">Datum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scoreboards as $scoreboard)
                                <tr>
                                    <td>{{ $scoreboard->driver_name }}</td>
                                    <td>{{ $scoreboard->time }}</td>
                                    <td>{{ $scoreboard->team_name }}</td>
                                    <td>{{ $scoreboard->date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Chart.js Line Chart -->
                    <canvas id="scoreboardChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Extract data for the chart from PHP to JavaScript
        var scoreboardData = @json($scoreboards);

        // Log data to console for debugging
        console.log('scoreboardData:', scoreboardData);

        // Prepare data for the chart
        var driverNames = scoreboardData.map(scoreboard => scoreboard.driver_name);
        var times = scoreboardData.map(scoreboard => new Date(scoreboard.time).getTime());

        // Log prepared data to console for debugging
        console.log('driverNames:', driverNames);
        console.log('times:', times);

        // Chart.js Configuration
        console.log('Chart.js Configuration');
        console.log('Labels:', driverNames);
        console.log('Data:', times);

        var ctx = document.getElementById('scoreboardChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: driverNames,
                datasets: [{
                    label: 'Time',
                    data: times,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
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

        // Comment out the page refresh interval for testing
        // setInterval(function() {
        //     location.reload();
        // }, 15000);
    </script>




@endsection
