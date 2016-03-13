<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="baumfällung, rodung, gartengestaltung, gartenpflege, grasschnitt, heckenschnitt, tischlerei, arborist">
        <meta name="author" content="mazedlx.net webproductions">
        <title>{{ $configs['name'] }}</title>
        <!-- Favicon Galore -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="favicons/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="css/app.css">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
    </head><!--/head-->
    <body id="home" class="homepage">
        @yield('content')
        <footer id="footer">
            <div class="container">
                <div class="row" >
                    <div class="col-sm-12">
                        &copy; {{ date('Y') }} {{ $configs['name'] }}
                    </div>
                    <!-- <div class="col-sm-6">
                         <ul class="social-icons">

                        </ul>
                    </div> -->
                </div>
            </div>
        </footer><!--/#footer-->
        <script src="js/app.js"></script>
        <script src="//maps.google.com/maps/api/js?key=AIzaSyCCUj7JuUo02JwoczHcBdRR8QPcf1aaNlk"></script>
        <script>
            $('[data-class="a-menu"]').click(function() {
                $('.navbar-collapse').collapse('hide');
            });
            @if(Session::has('msg_title'))
            swal({
                title: "{{ Session::get('msg_title') }}",
                text: "{{ Session::get('msg_body') }}",
                type: "success",
                confirmButtonText: "Ok"
            });
            @endif
        </script>
    </body>
</html>
