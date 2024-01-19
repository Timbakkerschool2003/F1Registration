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
                            <b>Team naam:</b> Aston Martin Cognizant Formula One Team<br>
                            <b>Vestiging:</b> Silverstone, Verenigd Koninkrijk<br>
                            <b>Debuut in de Formule 1:</b> Seizoen 2021<br>
                            <b>Eigenaar:</b> Lawrence Stroll<br>
                            <b>Technische Partner:</b> Het team gebruikt Mercedes-krachtbronnen.
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
                            <b>Team naam:</b> Scuderia Ferrari<br>
                            <b>Vestiging:</b> Scuderia Ferrari<br>
                            <b>Debuut in de Formule 1:</b> Seizoen 1950<br>
                            <b>Eigenaar:</b> Ferrari is een onderdeel van het Ferrari-bedrijf en is een divisie van Fiat Chrysler Automobiles (nu onderdeel van Stellantis).<br>
                            <b>Technische Partner:</b> Ferrari produceert zijn eigen krachtbronnen.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Herhaal vergelijkbare structuur voor andere kaarten -->

            <div class="col-md-4 mb-4">
                <div class="card animated-card">
                    <div class="card-body mclaren">
                        <img src="images\F1_teams\mclaren.png">
                        <h5 class="card-title"><b>McLaren</b></h5>
                        <p class="card-text">
                            <b>Team naam:</b> McLaren F1 Team<br>
                            <b>Vestiging:</b> Woking, Surrey, Verenigd Koninkrijk<br>
                            <b>Debuut in de Formule 1:</b> Seizoen 1966<br>
                            <b>Eigenaar:</b> McLaren Racing Limited<br>
                            <b>Technische Partner:</b> McLaren gebruikt Mercedes-krachtbronnen.
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
                            <b>Team naam:</b>Mercedes-AMG Petronas Formula One Team<br>
                            <b>Vestiging:</b> Brackley, Northamptonshire, Verenigd Koninkrijk, en Brixworth, Engeland (Power Unit Division)<br>
                            <b>Debuut in de Formule 1:</b> Seizoen 2010<br>
                            <b>Eigenaar:</b> Mercedes-Benz Grand Prix Limited<br>
                            <b>Technische Partner:</b> Mercedes produceert zijn eigen krachtbronnen.
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
                            <b>Team naam:</b>Red Bull Racing<br>
                            <b>Vestiging:</b>Milton Keynes, Verenigd Koninkrijk<br>
                            <b>Debuut in de Formule 1:</b> Seizoen 2005<br>
                            <b>Eigenaar:</b>Red Bull Racing is eigendom van Red Bull GmbH.<br>
                            <b>Technische Partner:</b>Red Bull Racing gebruikt Honda-krachtbronnen.
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
