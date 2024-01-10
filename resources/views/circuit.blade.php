<style>
    body {

    }

    .animated-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .animated-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card {
        background-color: #E12319 !important;
        color: #FFFFFF !important;
    }

    .card-title {
        color: white !important;
    }

    .card-text {
        color: #FFFFFF !important;
    }

    .mercedes {
        background-color: #000000;
        border: 5px solid #00A19B;
        border-radius: 1px;
    }

    .mclaren {
        background-color: #FF8000;
        border: 5px solid #000000;
        border-radius: 1px;
    }

    img {
        width: 100px;
        padding-bottom: 10px;
    }

    .Australië {
        background-color: #002420;
        border: 5px solid white;
        border-radius: 1px;
    }

    .redbull {
        background-color: #EC1845;
        border: 5px solid #FED502;
        border-radius: 1px;
    }

    .AustralieGP{
        width: 400px;
        height: 150px;

        border: 3px solid black;
    }

    .country{
        position: absolute;
        top: 0;
        overflow: hidden; /* Clear any potential floated content */
        right: 0;
    }

    .formule{
        position: relative;
    }

    .container {
        position: relative;
    }

    .topright {
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 18px;
        color:white;
    }

    .fotoBaan {
        width: 190px;
        height: 160px;
    }

    .achtergrond {
        height: 300px;
        background-color: #2A2A2D;
        border-radius: 10px;
    }

    .ExtraInfo{
        color: red;
    }

    .stats-header__meta__main {
        display: flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 24px;
        background-color: #555;
        text-transform: uppercase;
    }

    .datums{
        color: white;
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