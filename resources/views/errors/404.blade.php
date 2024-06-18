<!-- resources/views/errors/404.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
            margin: 0;
        }

        .container h1 {
            font-size: 20rem;
            margin: 0;
            color: #9f97af;
        }

        .container p {
            font-size: 2em;
            font-weight: 500;
            color: #ffffff;

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
            color: #9f97af;
            font-size: 20px
        }

        .container a:hover {
            text-decoration: underline;
        }

        img {
            width: 80%;
            border: 1px
        }

        @media screen and (max-width: 760px) {
            .container p {
                font-size: 20px;
                font-weight: 500;


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
        <img src="{{url('image/breakitlogo.png')}}">
        <h1>404</h1>
        <p>PAGE NOT FOUND</p>
        <a href="{{ url('/') }}">Go to Homepage</a>
    </div>

</body>

</html>