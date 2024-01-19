@extends('layouts.app')

@section('content')
    <head>
        <style>
            #input {
                background-position: 10px 12px;
                background-repeat: no-repeat;
                width: 100%;
                font-size: 16px;
                padding: 12px 20px 12px 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
        </style>
    </head>
    <div class="container">
        <div class="card mb-3" style="background-color: #e10600; color: #000000;">
            <div class="card-body">
                <input type="text" id="input" onkeyup="myFunction()" placeholder="Zoeken op voornaam..">
                <table id="tabel" class="table">
                    <thead>
                    <tr>
{{--                        <th scope="col">Coureur nummer</th>--}}
                        <th scope="col">Naam</th>
                        <th scope="col">Email</th>
                        <th scope="col">Wijzigen</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    if(auth()->user()->is_admin == 1){

                        print('is admin');?>

                    @foreach ($users as $user)
                        <tr>
{{--                            <td scope="row">{{ $user->id }}</td>--}}
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                    <a href="{{ route('editProfile', $user->id) }}" class="btn btn-warning">Wijzig gegevens</a>
                                    <form action="{{ route('destroyUser', $user->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Verwijder Account</button>
                                    </form>
                                    <a href="{{ route('editPassword') }}" class="btn btn-info">Wijzig wachtwoord</a>
                            </td>
                        </tr>
                    @endforeach
<?php

                    }   else { ?>
                    @foreach ($users as $user)
                        <tr>
{{--                            <th scope="row">{{ $user->id }}</th>--}}
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(auth()->check() && auth()->user()->id == $user->id)
                                    <a href="{{ route('editProfile', $user->id) }}" class="btn btn-warning">Wijzig gegevens</a>
                                    <form action="{{ route('destroyUser', $user->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Verwijder Account</button>
                                    </form>
                                    <a href="{{ route('editPassword') }}" class="btn btn-info">Wijzig wachtwoord</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    <?php }

                    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    setInterval(function() {
        location.reload();
    }, 15000);

        function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("input");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabel");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
    } else {
        tr[i].style.display = "none";
    }
    }
    }
    }

</script>
