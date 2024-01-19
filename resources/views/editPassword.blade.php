
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3" style="background-color: #e10600; color: #000000;">
            <div class="card-body">
                <h2>Edit Password</h2>

                <form action="{{ route('updatePassword') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
