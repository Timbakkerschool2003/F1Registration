@extends('layouts.app')

@section('content')
    <body style="background-image: url('/images/background.jpg'); background-size: cover; background-repeat: no-repeat;">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        Welkom bij F1 Registration! Hier worden alle gegevens bijgehouden van de F1 stoel!
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card border">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h2>Topscores</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Team</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($scoreboards as $scoreboard)
                                    <tr>
                                        <td>{{ $scoreboard->driver_name }}</td>
                                        <td>{{ $scoreboard->time }}</td>
                                        <td>{{ $scoreboard->team_name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
