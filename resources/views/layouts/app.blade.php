<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENIDO</title>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header id="header">
        <div class="container__header">
            <div class="logo">
                <h1 class="logo-social">NEQUI</h1>
            </div>
            <div class="container__nav">
                <nav id="nav">
                    <ul>
                        <li><a href="{{route('home.index')}}" class="select">INICIO</a></li>
                        <li><a href="{{ url('/home/' . $user->id . '/edit') }}">DATOS</a></li>
                        <li><a href="{{route('depositos.depositar')}}">DEPOSITOS</a></li>
                        <li><a href="{{route('retiros.retirar')}}">RETIROS</a></li>
                        <li><a href="{{route('depositos.movimientos')}}">MOVIMIENTOS</a></li>
                        <li><a href="{{route('login.destroy')}}">CERRAR SESION</a></li>
                    </ul>
                </nav>
                <div class="btn__menu" id="btn_menu"><i class="fas fa-bars"></i></div>
            </div>
        </div>
    </header>

    @yield('content')
