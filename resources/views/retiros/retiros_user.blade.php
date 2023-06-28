@extends('layouts.app')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOVIMIENTOS DE RETIRO</title>
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
</head>
<body>
    <div class="container">
        <table class="table">
            <caption>Movimientos de retiro de {{ $user->nombre_completo }}</caption>
            <thead>
                <tr>
                    <th>Mes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retirosTriggers as $triggers)
                    @php
                        $mes = date('F Y', strtotime($triggers->fecha));
                    @endphp
                    <tr>
                        <thead>
                            <td>{{ $mes }}</td>
                        </thead>

                    <tr>
                        <td>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Nombre Completo</th>
                                        <th>Saldo Inicial</th>
                                        <th>Saldo a Retirar</th>
                                        <th>Saldo Total</th>
                                        <th>fecha_hora</th>
                                        <th>fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Documento">{{ $triggers->documento }}</td>
                                        <td data-label="Nombre Completo">{{ $triggers->nombre_completo }}</td>
                                        <td data-label="Saldo Inicial">{{ $triggers->saldo_inicial }}</td>
                                        <td data-label="Saldo a Depositar">{{ $triggers->saldo_retiro }}</td>
                                        <td data-label="Saldo Total">{{ $triggers->saldo_final }}</td>
                                        <td data-label="Fecha y hora">{{ $triggers->fecha_hora }}</td>
                                        <td data-label="Fecha">{{ $triggers->fecha }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <caption>Saldo Final de Mes {{ $user->saldo_inicial }}</caption>
                    </td>
                </tr>
                <tr>
                    <td>
                        <caption>Total de Retiros: {{ $countRows }}</caption>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
