<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>paulmies.at - Administration</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <a class="navbar-brand" href="/admin">paulmies.at</a>
                <ul class="nav navbar-nav">
                    <li class="{{ Request::segment(2) ==  '' ? 'active' : ''  }}">
                        <a href="/admin">Home</a>
                    </li>
                    <li class="{{ Request::segment(2) ==  'contents' ? 'active' : ''  }}">
                        <a href="/admin/contents">Inhalte</a>
                    </li>
                    <li class="{{ Request::segment(2) ==  'uploads' ? 'active' : ''  }}">
                        <a href="/admin/uploads">Bilder</a>
                    </li>
                    <li class="{{ Request::segment(2) ==  'slides' ? 'active' : ''  }}">
                        <a href="/admin/slides">Slides</a>
                    </li>
                    <li class="{{ Request::segment(2) ==  'settings' ? 'active' : ''  }}">
                        <a href="/admin/settings">Einstellungen</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="/logout">Abmelden</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <script>
        @if(Session::has('msg_body'))
        swal({
            title: "{{ Session::get('msg_title', '') }}",
            text: "{{ Session::get('msg_body', '') }}",
            type: "info",
            confirmButtonText: "Ok"
        });
        </script>
        @endif
    </body>
</html>
