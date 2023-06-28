@extends('layouts.app')

@section('content')
    <div class="container_all" id="container__all">
        <div class="cover">

            <!--CONTENEDORES DE DISEÑ0-->

            <div class="bg_color"></div>

            <!--SECCION PARA MOSTRAR LOS DATOS DEL USUARIO -->

            <div class="container__cover">
                <div class="container__info">
                    <div class="container_dates">
                        <h1>BIENVENIDO</h1>
                        <p>{{ $user->nombre_completo}}</p>
                    </div>
                    <div class="container_saldo">
                        <h1>Saldo Disponible</h1>
                        <p>${{ $user->saldo_inicial}}</p>
                        <div  role="alert">
                            @if (Session::has('success'))
                                {{ Session::get('success') }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="container__vector">
                    <img src="{{url('images/undraw_Code_thinking_re_gka2.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.footer')
