<!DOCTYPE html>
<html>
<head>
    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('script')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>
<body>

    <nav>

        <div class="container">

            @isset($user)
                
                <div class="btn-group pull-left">
                    <a class="btn btn-primary" href="/">Home</a>
                    <a class="btn btn-primary" href="/banks">Banks</a>
                    <a class="btn btn-primary" href="/accounts">My accounts</a>
                    <a class="btn btn-primary" href="/transactions">My transactions</a>
                </div>

                @if($user->admin)

                    <div class="btn-group">
                        <a class="btn btn-warning" href="/users">All users</a>
                        <a class="btn btn-warning" href="/admin/accounts">All cccounts</a>
                        <a class="btn btn-warning" href="/admin/transactions">All transactions</a>
                    </div>

                @endif

                <div class="btn-group pull-right">
                    <a class="btn btn-primary" href="/logout">Log out</a>
                </div>

            @else

                <div class="btn-group pull-left">
                    <a class="btn btn-primary" href="/login">Log in</a>
                    <a class="btn btn-primary" href="/register">Register</a>
                </div>

            @endisset

        </div>

    </nav>

    <div class="jumbotron">

        <div class="container">

            <h1>Bank app</h1>
            <p>Keepin' it safe</p>

        </div>

    </div>

    <div class="container">

        @yield('content')

    </div>

</body>
</html>