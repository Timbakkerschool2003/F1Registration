@extends('layouts.app')

@section('content')
    <div class="container">
        <tbody>

        @foreach ($profiles as $profile)
            <?php var_dump($profiles); ?>
                <?php highlight_string("<?php\n\$profiles = " . var_export($profiles, true) . ";\n?>");
                ?>


        @endforeach

        @foreach($trophyData as $trophy)
            <tr>
                <td><?php

                if($trophy->trophys_id == 1){
                    echo "<br>";
                    echo "gold";
                    }

                    if($trophy->trophys_id == 2){
                    echo "<br>";
                    echo "silver";
                    }

                    if($trophy->trophys_id == 3){
                    echo "<br>";
                    echo "bronze";
                    }?></td>
            </tr>

            <?php



?>
        @endforeach

        </tbody>
        <!-- ... (existing code) ... -->
    </div>
@endsection
