@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if(Auth::check())
            @if($userTrophies->count() > 0)
                <h1 class="mb-4">Welkom, {{ Auth::user()->name }}!</h1>
                <h4 class="mb-4">Dit zijn jouw trofeeën!</h4>
                <ul class="list-group">
                    @foreach ($userTrophies as $trophy)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $trophy['trophyname'] }}
                            <form action="{{ route('remove_trophy', $trophy->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove Trophy</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <h1>Je hebt nog geen trofeeën gewonnen. Behaal ze zo snel mogelijk!</h1>
            @endif

            <div class="mt-4">
                <h4>Voeg trofee toe</h4>
                <form action="{{ route('process_trophy_form') }}" method="post">
                    @csrf
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <select class="form-control" name="trophy" id="trophy">
                            @foreach ($trophies as $trophy)
                                <option value="{{ $trophy->id }}">{{ $trophy->trophyname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>

            <script>
                @if(session('error'))
                alert("{{ session('error') }}");
                @endif
            </script>

        @else
            <p class="mt-5"><a href="{{ route('login') }}">Log in</a> om deze pagina te bekijken.</p>
        @endif
    </div>
@endsection
