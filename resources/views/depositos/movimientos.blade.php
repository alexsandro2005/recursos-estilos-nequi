@extends('layouts.app')

@section('content')
    <div class="container_all" id="container__all">
        <div class="cover">

            <!--CONTENEDORES DE DISEÑ0-->

            <div class="bg_color"></div>

            <!--SECCION PARA MOSTRAR LOS DATOS DEL USUARIO -->

            <div class="container__cover">
                <div class="container__info">

                    <div class="container_saldo">
                        <p>¿Que movimientos desea ver?</p>
                        <h1>{{$user->nombre_completo}}</h1>
                        <div class="buttons_redi">
                            <a class="buttons" href="{{route('triggersRetiros.index')}}" >Retiros</a>
                            <a class="buttons" href="{{route('triggersDepositos.index')}}">Depositos</a>
                        </div>
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

