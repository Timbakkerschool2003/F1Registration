@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-3">
            <div class="card border">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2>Trophy Counts by Driver</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Racer</th>
                                <th scope="col">Gold</th>
                                <th scope="col">Silver</th>
                                <th scope="col">Bronze</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->name }}</td>
                                    <td>{{ $driver->gold_count }}</td>
                                    <td>{{ $driver->silver_count }}</td>
                                    <td>{{ $driver->bronze_count }}</td>
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
