@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="{{ asset('images/F1_teams/aston-martin.png') }}" alt="Aston Martin">
                <img src="{{ asset('images/F1_teams/ferarri.png') }}" alt="Ferarri">
                <img src="{{ asset('images/F1_teams/mclaren.png') }}" alt="McLaren">
                <img src="{{ asset('images/F1_teams/mercedes.png') }}" alt="Mercedes">
                <img src="{{ asset('images/F1_teams/redbull.png') }}" alt="Red Bull">
            </div>
        </div>
    </div>
@endsection
