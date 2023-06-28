<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <link rel="stylesheet" href="{{ 'css/style.css' }}" />
    <title>INICIO DE SESION || NEQUI</title>
</head>

<body>
    <div class="container">
        <div class="containertwo">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="" method="POST" autocomplete="off" class="sign-in-form">
                        <h2 class="title">Inicio de Sesion</h2>
                        @csrf
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="number" name="celular" required onkeypress="return(multiplenumber(event))"
                                oninput="maxlengthNumber(this);" minlength="10" maxlength="10"
                                placeholder="Ingrese su numero de celular" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="password" name="password" required minlength="10" oninput="maxlengthNumber(this);"
                                maxlength="20" placeholder="Ingrese su contraseña" />
                        </div>
                        @error('message')
                            <p class="message">{{ $message }}
                            </p>
                        @enderror

                        <div  role="alert">
                            @if (Session::has('mensaje'))
                                {{ Session::get('mensaje') }}
                            @endif
                        </div>
                        
                        <input type="submit" value="Iniciar Sesion" class="btn solid" />

                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>No tiene cuenta ?</h3>
                        <p>
                            Oprima click en el boton de registrarme
                        </p>
                        <a href="{{ url('register') }}" class="btn transparent" id="sign-up-btn">
                            Registrarme
                        </a>
                    </div>
                    <img src="img/log.svg" class="image" alt="" />
                </div>

            </div>
        </div>

    </div>


    <script>
        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO NUMEROS EN EL CAMPO DEL FORMULARIO ASIGNADO -->

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
