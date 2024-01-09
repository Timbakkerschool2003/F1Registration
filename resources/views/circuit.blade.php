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

    .astonmartin {
        background-color: #002420;
        border: 5px solid white;
        border-radius: 1px;
    }

    .redbull {
        background-color: #EC1845;
        border: 5px solid #FED502;
        border-radius: 1px;
    }

</style>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card animated-card">
                    <div class="card-body astonmartin">
                        <img src="images\F1_teams\aston-martin.png">
                        <h5 class="card-title"><b>Aston Martin</b></h5>
                        <p class="card-text">
                            <b>Team Name:</b> Aston Martin Cognizant Formula One Team<br>
                            <b>Base:</b> Silverstone, United Kingdom<br>
                            <b>Debut in Formula 1:</b> 2021 season<br>
                            <b>Ownership:</b> Lawrence Stroll.<br>
                            <b>Technical Partner:</b> The team uses Mercedes power units.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card animated-card">
                    <div class="card-body">
                        <img src="images\F1_teams\ferarri.png">
                        <h5 class="card-title"><b>Ferrari</b></h5>
                        <p class="card-text">
                            <b>Team Name:</b> Scuderia Ferrari<br>
                            <b>Base:</b> Scuderia Ferrari<br>
                            <b>Debut in Formula 1:</b> 1950 season<br>
                            <b>Ownership:</b> Ferrari is a part of the Ferrari company and is a division of Fiat Chrysler Automobiles (now part of Stellantis).<br>
                            <b>Technical Partner:</b> Ferrari manufactures its own power units.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Repeat similar structure for other cards -->

            <div class="col-md-4 mb-4">
                <div class="card animated-card">
                    <div class="card-body mclaren">
                        <img src="images\F1_teams\mclaren.png">
                        <h5 class="card-title"><b>McLaren</b></h5>
                        <p class="card-text">
                            <b>Team Name:</b> McLaren F1 Team<br>
                            <b>Base:</b> Woking, Surrey, United Kingdom<br>
                            <b>Debut in Formula 1:</b> 1966 season<br>
                            <b>Ownership:</b> McLaren Racing Limited<br>
                            <b>Technical Partner:</b> McLaren uses Mercedes power units.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-4">
                <div class="card animated-card">
                    <div class="card-body mercedes">
                        <img src="images\F1_teams\mercedes.png">
                        <h5 class="card-title"><b>Mercedes</b></h5>
                        <p class="card-text">
                            <b>Team Name:</b>Mercedes-AMG Petronas Formula One Team<br>
                            <b>Base:</b> Brackley, Northamptonshire, United Kingdom, and Brixworth, England (Power Unit Division)<br>
                            <b>Debut in Formula 1:</b> 2010 season<br>
                            <b>Ownership:</b> Mercedes-Benz Grand Prix Limited<br>
                            <b>Technical Partner:</b> Mercedes manufactures its own power units.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card animated-card">
                    <div class="card-body redbull">
                        <img src="images\F1_teams\redbull.png">
                        <h5 class="card-title"><b>Red Bull</b></h5>
                        <p class="card-text">
                            <b>Team Name:</b>Red Bull Racing<br>
                            <b>Base:</b>Milton Keynes, United Kingdom<br>
                            <b>Debut in Formula 1:</b> 2005 season<br>
                            <b>Ownership:</b>Red Bull Racing is owned by Red Bull GmbH.<br>
                            <b>Technical Partner:</b>Red Bull Racing uses Honda power units.
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
