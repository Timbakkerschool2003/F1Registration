@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-3">
            <div class="card border">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2>Profielen</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Voornaam</th>
                                <th scope="col">Achternaam</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($profiles as $profile)
                                <tr>
                                    <td>{{ $profile->firstname }}</td>
                                    <td>{{ $profile->lastname }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
