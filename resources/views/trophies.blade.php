@extends('layouts.app')

@section('content')
    <div class="container">
        <tbody>

        {{--        @foreach ($profiles as $profile)--}}
        {{--        @endforeach--}}


        {{--        @foreach ($profiles as $user)--}}
        {{--            {{ $user->name }}--}}
        {{--        @endforeach--}}


        {{--        @foreach($trophyData as $trophy)--}}
        {{--            <tr>--}}
        {{--                <td><?php--}}

        {{--                if($trophy->trophys_id == 1){--}}
        {{--                    echo "<br>";--}}
        {{--                    echo "gold";--}}
        {{--                    }--}}

        {{--                    if($trophy->trophys_id == 2){--}}
        {{--                    echo "<br>";--}}
        {{--                    echo "silver";--}}
        {{--                    }--}}

        {{--                    if($trophy->trophys_id == 3){--}}
        {{--                    echo "<br>";--}}
        {{--                    echo "bronze";--}}
        {{--                    }?></td>--}}
        {{--            </tr>--}}

        {{--        @endforeach--}}
        <!-- resources\views\your\view.blade.php -->

        @php
            $usersWithTrophies = \App\Models\UserHasTrophy::with('user', 'trophy')->get();
        @endphp

        @foreach ($usersWithTrophies as $userWithTrophy)
            @php
                $user = $userWithTrophy->user;
                $trophy = $userWithTrophy->trophy;
                //var_dump($userWithTrophy->trophy['trophyname']);
                print('<br>');
                var_dump($userWithTrophy->user['name']);
/*                highlight_string("<?php\n\$profiles = " . var_export($userWithTrophy, true) . ";\n?>");*/

            @endphp


                <!-- Nu heb je toegang tot de gegevens van de gebruiker en de trofee -->
            <!-- bijvoorbeeld: $user->name, $trophy->name -->
        @endforeach

        </tbody>

        <!-- ... (existing code) ... -->
    </div>
@endsection
