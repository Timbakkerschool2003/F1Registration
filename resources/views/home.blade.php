@extends('layouts.app')

@section('content')
    <body style="background-image: url('/images/background.jpg'); background-size: cover; background-repeat: no-repeat;">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        Welkom in de razendsnelle wereld van het F1Registratie! Stap in de cockpit en laat je adrenaline stijgen terwijl we de grenzen van snelheid verkennen. Ons F1 registratiesysteem is meer dan zomaar een scorebord; het is de ultieme pitstop voor de fanatieke race-enthousiastelingen die altijd op zoek zijn naar de volgende bocht, de perfecte rondetijd en de glinstering van het podium.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-body">
                        Bereid je voor op een race-ervaring als nooit tevoren terwijl we jouw scores bijhouden, rivaliteiten aanwakkeren en je meenemen op een virtuele reis door de wereld van Formule 1. Ben jij klaar om de snelheid te omarmen, de adrenaline te voelen en jouw plaats op het erepodium te veroveren? Laat de motoren brullen en duik in het hart van de race met F1Registratie!                    </div>
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
