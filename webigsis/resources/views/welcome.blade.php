<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'webIG.sis 2') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 5px;
            }


            .subtitle {
                margin-top: 0px;
                font-size: 12px;
                font-weight: 600;
            }
            .subtitle p {
                color: black;
                background-color: LightSkyBlue ;
                padding: 5px 25px;
                font-style: 
            }

            .web {
                color: #17a2b8;
                font-weight: 100;
            }

            .ig {
                color: #999;
                font-weight: 600
            }

            .sis {
                font-size: 60%;
            }

            hr {
                border-color: orange;
                border-style: solid;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height ">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                        <!-- <a href="{{ route('register') }}">Register</a> -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md card-title">
                    <span class='web'>web</span><span class='ig'>IG</span class='ig'>.<span class='sis'>sis</span>
                </div>

                <!--
                <hr>

                <div class="links">
                    <a href="#">Manual</a>
                    <a href="#">WebiG</a>
                    <a href="#">MSM</a>
                </div>
                -->
            </div>
        </div>
    </body>
</html>
