@extends('layouts.app')

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <form action="{{ route('process_trophy_form') }}" method="post">--}}
{{--            @csrf--}}
{{--            <label for="trophy">Kies Coureurs</label>--}}
{{--            <input type="hidden"  ><br>--}}

{{--            <label for="trophy">Select Trophy:</label>--}}
{{--            <select name="trophy" id="trophy">--}}
{{--                @foreach ($trophies as $trophy)--}}
{{--                    <option value="{{ $trophy->id }}">{{ $trophy->trophyname }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <button type="submit">Submit</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}


@section('content')
    <h1>Add Trophy</h1>

    @if(Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <p>Your user ID is: {{ Auth::user()->id }}</p>
        {{-- Voeg hier andere inhoud toe die je wilt weergeven voor ingelogde gebruikers --}}
    @else
        <p>Please log in to view this page.</p>
    @endif

    {{-- Voeg hier andere inhoud toe die je wilt weergeven voor alle gebruikers --}}

@endsection

