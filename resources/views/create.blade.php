@extends('layouts.app')

@section('content')

    <title>Inloggen</title>
    <style>

        .formCreate {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
    <form class="formCreate" action="login.php" method="post">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" id="wachtwoord" name="wachtwoord" required>

        <button class="btn btn-danger" type="submit">Inloggen</button>
    </form>
    </body>
    </form>
@endsection
