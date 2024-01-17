@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-3">
            <div class="card border">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2>Trofeeën</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Trofee</th>
                                <th scope="col">Coureur</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $usersWithTrophies = \App\Models\UserHasTrophy::with('user', 'trophy')->get();
                            @endphp
                            @foreach ($usersWithTrophies as $userWithTrophy)
                                <tr>
                                    <td>{{ $userWithTrophy->trophy->trophyname }}</td>
                                    <td>{{ $userWithTrophy->user->name }}</td>
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
