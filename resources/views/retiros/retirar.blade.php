@extends('layouts.app')
<?php
date_default_timezone_set('America/Bogota');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <link rel="stylesheet" href="{{ 'css/style.css' }}" />
    <title>RETIRAR DINERO</title>
</head>
<body>
    <div class="container">
        <div class="containertwo">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="" method="POST" autocomplete="off" class="sign-in-form">
                        <h2 class="title">Retiro de Dinero</h2>
                        @csrf
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="number" name="saldo_retiro" required
                                onkeypress="return(multiplenumber(event))" oninput="maxlengthNumber(this);"
                                minlength="5" maxlength="10" placeholder="Ingrese valor de retiro" />
                        </div>

                        <input type="hidden" value="{{ $user->saldo_inicial }}" name="saldo_inicial" required
                            onkeypress="return(multiplenumber(event))" oninput="maxlengthNumber(this);" />

                        <input type="hidden" value="{{ $user->id }}" name="documento" required readonly />
                        <input type="hidden" value="{{ $user->nombre_completo }}" name="nombre_completo" required
                            readonly />
                        @error('success')
                            <p class="message">{{$success}}
                            </p>
                        @enderror
                        @error('message')
                            <p class="message">{{$message}}
                            </p>
                        @enderror
                        <input type="submit" value="Retirar" class="btn solid" />

                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO NUMEROS EN EL FORMULARIO ASIGNADO -->

        function multiplenumber(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            numeros = "1234567890";

            especiales = "8-37-38-46-164-46";

            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                    alert("Debe ingresar solo numeros en el formulario");
                    break;
                }
            }

            if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
                alert("Debe ingresar solo numeros en el formulario ");
            }
        }



        function maxlengthNumber(obj) {

            if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo el numeros de digitos requeridos que en este caso son 10 digitos");
            }
        }

        function passswordNumber(obj) {

            if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar como minimo 10 digitos y maximo 20 digitos");
            }
        }
    </script>
</body>

</html>
