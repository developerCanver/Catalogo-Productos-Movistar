<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>Login page | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header p-4 bg-primary">
                                <h4 class="text-white text-center mb-0 mt-0">Movistar</h4>
                            </div>
                            <div class="card-body">
                                <x-jet-validation-errors class="mb-4" />

                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Correo :</label>
                                        <input class="form-control" type="email" id="email"  name="email" :value="old('email')"  placeholder="canver@gmail.com" required autofocus>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña :</label>
                                        <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password"  placeholder="Contraseña">
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember_me" name="remember"type="checkbox" checked="">
                                            <label for="remember">
                                                Recuérdame
                                            </label>
                                           
                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-6">
                                            <a href="{{ url('/') }}" class="dropdown-item notify-item">
                                                <span>Cancelar</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <button style="background-color: #1a2942;
                                            border: none;" class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Iniciar sesión</button>
                                        </div>
                                    </div>
                                 

                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>
