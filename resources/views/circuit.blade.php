<style>
    img {
        width: 100px;
        padding-bottom: 10px;
    }

    .container {
        position: relative;
    }

    .SizePictures{
        height: 275px;
        width: 325px;
    }
</style>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <img class="SizePictures" src="images\races\australieRace.png">
            </div>

            <div class="col">
                <img class="SizePictures" src="images\races\bahreinRace.png">
            </div>
            <div class="col">
                <img class="SizePictures" src="images\races\chinaRace.png">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <img class="SizePictures" src="images\races\japanRace.png">
            </div>

            <div class="col">
                <img class="SizePictures" src="images\races\miamiRace.png">
            </div>
            <div class="col">
                <img class="SizePictures" src="images\races\jeddahRace.png">
            </div>
        </div>


    </div>
@endsection
