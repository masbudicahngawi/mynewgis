<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/aset_login/gaya.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>

<body>


    <div class="bg-img">
        <div class="content">
            <header>mynewgis</header>
            <form method="post" action="{{ route('proses-login') }}">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="name" required placeholder="Username">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" class="password" required placeholder="Password">
                </div>
                <br />

                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>

            </form>
        </div>
    </div>

</body>

</html>
