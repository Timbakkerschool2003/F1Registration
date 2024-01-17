@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('process_trophy_form') }}" method="post">
            @csrf
            <label for="trophy">Select Trophy:</label>
            <select name="trophy" id="trophy">
                @foreach ($trophies as $trophy)
                    <option value="{{ $trophy->id }}">{{ $trophy->trophyname }}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
