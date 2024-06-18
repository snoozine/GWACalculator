<!-- resources/views/errors/500.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #3f3d56;
            color: #6c757d;
        }

        .container {
            text-align: center;
        }

        .container h1 {
            font-size: 5em;
            margin: 0;
            color: #9f97af;
        }

        .container p {
            font-size: 1.5em;
        }

        .container pre {
            text-align: left;
            margin: 20px auto;
            padding: 10px;
            background: #fff;
            color: #000;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 80%;
            overflow-x: auto;
            max-height: 300px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .container a {
            text-decoration: none;
            color: #3f3d56;
        }

        .container a:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 760px) {
            .container p {
                font-size: 20px;
                font-weight: 500;


            }

            .container pre {
                text-align: left;
                margin: 20px auto;
                padding: 10px;
                background: #fff;
                color: #000;
                border: 1px solid #ddd;
                border-radius: 5px;
                width: 350px;
                overflow-x: auto;
                max-height: 300px;
                white-space: pre-wrap;
                word-wrap: break-word;
            }

            .container h1 {
                font-size: 100px;
                margin: 0;
                color: #9f97af;
            }

            img {
                width: 80%;

            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{url('image/breakitlogo.png')}}" alt="">
        <h1>500</h1>
        <p>Server Error</p>
        <p><a href="{{ url('/') }}">Go to Homepage</a></p>

        @if(config('app.debug'))
        <pre>{{ $exception->getMessage() }}</pre>
        <pre>{{ $exception->getTraceAsString() }}</pre>
        @else
        <p>Something went wrong. Please try again later.</p>
        @endif
    </div>
</body>

</html>