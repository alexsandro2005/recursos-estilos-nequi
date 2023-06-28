@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>ACTUALIZACION DE USUARIO || NEQUI</title>
    <link rel="stylesheet" href="{{ asset('css/style_update.css') }}">
</head>

<body onload="limitarFechas()">

    <!-- FORM CONTAINER -->

    <div class="container"></div>
    <main>

        <form method="POST" name="formreg" enctype="multipart/form-data" action="{{url('/home/'. $user->id)}}" autocomplete="off"
            id="formulario" class="formulario">
            
            @csrf
            {{ method_field('PATCH') }}

            <!-- Container: Document -->
            <div class="formulario__grupo" id="grupo__document">
                <label for="document" class="formulario__label">Numero de documento</label>
                <div class="formulario__grupo-input">
                    <input type="number" minlength="6" value="{{ $user->id }}"
                        onkeypress="return(multiplenumber(event));" maxlength="10" oninput="maxlengthNumber(this);"
                        readonly class="formulario__input" autofocus name="id" title="Numero de documento"
                        id="document" required placeholder="Ingrese su numero de documento">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                @error('id')
                    <p class="message">{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Container: Nombre -->

            <div class="formulario__grupo" id="grupo__name">
                <label for="name" class="formulario__label">Nombre Completo</label>
                <div class="formulario__grupo-input">
                    <input type="text" readonly class="formulario__input"
                        value="{{ old('nombre_completo', $user->nombre_completo) }}"
                        onkeypress="return(textspace(event))" minlength="10" oninput="maxlengthNumber(this);"
                        maxlength="30" name="nombre_completo" required id="name"
                        placeholder="Ingrese su nombre completo">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                @error('nombre_completo')
                    <p class="message">{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Group Departamento -->

            <div class="formulario__grupo ">
                <label for="tipousuario" class="formulario__label label">Departamento</label>
                <div class="formulario__grupo__input">
                    <select name="id_departamento" class="formulario__input">
                        <option value="{{$user->id_departamento}}">Seleccione un nuevo departamento</option>

                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Container: Adress -->
            <div class="formulario__grupo" id="grupo__direccion">
                <label for="direccion" class="formulario__label">Direccion</label>
                <div class="formulario__grupo-input">
                    <input type="text" minlength="10" value="{{ $user->direccion }}" maxlength="100"
                        oninput="(maxlengthNumber(this))" class="formulario__input" name="direccion" required
                        id="direccion" placeholder="Ingrese su direccion">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                @error('direccion')
                    <p class="message">{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Group Tipo de documento -->

            <div class="formulario__grupo ">
                <label for="tipousuario" class="formulario__label label">Tipo de Documento</label>
                <div class="formulario__grupo__input">
                    <select name="tipo_documento" class="formulario__input">
                        <option>{{ $user->tipo_documento }}</option>
                    </select>
                </div>
            </div>


            <!-- Container: telephone -->
            <div class="formulario__grupo" id="grupo__telephone">
                <label for="telephone" class="formulario__label">Numero de Celular</label>
                <div class="formulario__grupo-input">
                    <input type="number" minlength="10" class="formulario__input" maxlength="10"
                        onkeypress="return(multiplenumber(event))" name="celular" readonly value="{{ $user->celular }}"
                        oninput="maxcelNumber(this);" required id="telephone"
                        placeholder="Ingrese su numero de contacto">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                @error('celular')
                    <p class="message">{{ $message }}
                    </p>
                @enderror
            </div>

            <input type="hidden" readonly class="formulario__input" value="2" o name="type_user" required
                id="telephone">

            <!-- Container: fecha de nacimiento -->

            <div class="formulario__grupo" id="grupo__datetime">
                <label for="telephone" class="formulario__label">Fecha de nacimiento</label>
                <div class="formulario__grupo-input">
                    <input type="date" value="{{ $user->fecha_nacimiento }}" readonly class="formulario__input"
                        name="fecha_nacimiento" required id="fecha" placeholder="Ingrese su fecha de nacimiento">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Debe ingresar su fecha de nacimiento</p>
            </div>


            <!-- Container: fecha de expedicion -->

            <div class="formulario__grupo" id="grupo__datetime">
                <label for="telephone" class="formulario__label">Fecha de Expedicion</label>
                <div class="formulario__grupo-input">
                    <input type="date" value="{{ $user->fecha_expedicion }}" readonly class="formulario__input"
                        name="fecha_expedicion" required id="fecha_exp" placeholder="Ingrese su fecha de nacimiento">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Debe ingresar su fecha de nacimiento</p>
            </div>

            <!-- Container: Saldo -->

            <div class="formulario__grupo" id="grupo__name">
                <label for="name" class="formulario__label">Saldo</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" readonly value="{{ $user->saldo_inicial }}"
                        minlength="5" oninput="maxlengthNumber(this);" maxlength="9" name="saldo_inicial" required
                        id="name" placeholder="Ingrese saldo inicial">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                @error('saldo_inicial')
                    <p class="message">{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Container: Foto -->
            <div class="formulario__grupo" id="grupo__direccion">
                <label for="foto" class="formulario__label">Foto</label>
                <img class="img_user" src="{{ asset('storage') . '/' . $user->foto }}" alt="">
            </div>


            <!-- Container: Foto -->
            <div class="formulario__grupo" id="grupo__direccion">
                <label for="foto" class="formulario__label">Cambiar Foto</label>

                <div class="formulario__grupo-input">
                    <input type="file" class="formulario__input" name="foto" id="foto">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                @error('foto')
                    <p class="message">{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Group Ciudad -->

            <div class="formulario__grupo ">
                <label for="tipousuario" class="formulario__label label">Ciudad Residencia</label>
                <div class="formulario__grupo__input">
                    <select name="id_ciudad" class="formulario__input">
                        <option value="{{$user->id_ciudad}}">Seleccione una nueva ciudad</option>

                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}">{{ $ciudad->ciudad }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <input type="submit" value="Actualizar"class="formulario__btn">
            </div>
        </form>
    </main>


    <script>
        // FUNCION DE JAVASCRIPT PARA VALIDAR LOS AÑOS DE RANGO PARA LA FECHA DE NACIMIENTO
        var fechaInput = document.getElementById('fecha');
        // Calcular las fechas mínima y máxima permitidas
        var fechaMaxima = new Date();
        fechaMaxima.setFullYear(fechaMaxima.getFullYear() - 18); // Restar 18 años para que la persona se registre
        var fechaMinima = new Date();
        fechaMinima.setFullYear(fechaMinima.getFullYear() - 80); // Restar 80 años
        // Formatear las fechas mínima y máxima en formato de fecha adecuado (YYYY-MM-DD)
        var fechaMaximaFormateada = fechaMaxima.toISOString().split('T')[0];
        var fechaMinimaFormateada = fechaMinima.toISOString().split('T')[0];

        // Establecer los atributos min y max del campo de entrada de fecha
        fechaInput.setAttribute('min', fechaMinimaFormateada);
        fechaInput.setAttribute('max', fechaMaximaFormateada);


        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO EL NUMERO VALORES REQUERIDOS DE ACUERDO A LA LONGITUD MAXLENGTH DEL CAMPO -->


        function maxlengthNumber(obj) {

            if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo el numeros de digitos requeridos");
            }
        }

        function maxcelNumber(obj) {

            if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
                alert("Debe ingresar solo 10 numeros.");
            }
        }

        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS -->

        function multipletext(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            letras = "qwertyuiopasdfghjklñzxcvbnm";

            especiales = "8-37-38-46-164-46";

            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                    alert("Debe ingresar solo letras y espacios en el campo");
                    break;
                }
            }

            if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
                alert("Debe ingresar solo letras y espacios en el campo");
            }
        }



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


        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS Y ESPACIOS EN EL CAMPO EL CUAL SE INVOCA EL EVENTO  -->

        function textspace(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            letrasspace = "qwertyuiopasdfghjklñzxcvbnm ";

            especiales = "8-37-38-46-164-46";

            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                    alert("Debe ingresar solo letras y espacios en el campo asignado");
                    break;
                }
            }

            if (letrasspace.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
                alert("Debe ingresar solo letras y espacios en el campo asignado");
            }
        }


        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS Y ESPACIOS EN EL CAMPO EL CUAL SE INVOCA EL EVENTO  -->

        function textguions(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            letrasguions = "qwertyuiopasdfghjklñzxcvbnm1234567890_";

            especiales = "8-37-38-46-164-46";

            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                    alert("Debe ingresar solo letras y espacios en el campo asignado");
                    break;
                }
            }

            if (letrasguions.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
        }

        // <!-- FUNCION DE JAVASCRIPT QUE PERMITE INGRESAR SOLO LETRAS. NUMEROS Y GUIONES BAJOS PARA LA CONTRASEÑA   -->


        function validarPassword(event) {
            // Obtenemos la tecla que se ha presionado
            var key = event.keyCode || event.which;

            // Convertimos el código de la tecla a su respectivo carácter
            var char = String.fromCharCode(key);

            // Definimos una expresión regular que solo permita números, letras y guiones bajos
            var regex = /[0-9a-zA-Z_]/;

            // Validamos si el carácter ingresado cumple con la expresión regular
            if (!regex.test(char)) {
                // Si no cumple, cancelamos el evento de ingreso de datos
                event.preventDefault();
                return false;
            }
        }


        function fechaCumple() {
            var fecha = new Date();
            var mes = fecha.getMonth() + 1;
            var dia = fecha.getDate();
            var anio = fecha.getFullYear() - 18;

            if (mes < 10) {
                mes = '0' + mes;
            }

            if (dia < 10) {
                dia = '0' + dia;
            }

            var fechaCumple = anio + '-' + mes + '-' + dia;

            return fechaCumple;
        }
    </script>

    <script src="controller/js/formulario.js"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>

    <script src="controller/js/password.js"></script>

</body>

</html>
