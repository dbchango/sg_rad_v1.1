@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SG-RAD</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">

        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user" content="{{Auth::user()}}">
    </head>

    @section('content')
        <body>
            <div id="app">

                <app></app>
            </div>

        </body>
        <footer class="footer">
            <div class="card text-center mt-5">
                <div class="card-body" style="background: #343A40; font: sans-serif;">
                    <h5 class="" style="color: #CE5202; ">Copyright © 2020 TIC's ESPEL</h5>
                    <p style="color:#9b9b9b">Powered by&nbsp;<a style="color:#00B8FE" href="https://laravel.com/" >Laravel</a></p>
                </div>
                <div class="card-footer text-muted" style="background: #343a40f1;">
                    <h6 style="color:#cccbcb;">Universidad de las Fuerzas Armadas -  ESPE - Sede Latacunga</h6>
                </div>
            </div>
        </footer>
    @endsection


</html>

<script>

    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
       'apiToken' => Auth::user()!=null ? Auth::user()->createToken('my-app-token')->plainTextToken:null ,
       'user' => Auth::user()
    ]) !!};



/*
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'user' => Auth::user()
    ]) !!};
*/

</script>

<style>
    .contenedor{
    width: 100%;
    }


    .body{
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-body-footer{
        background: #cccbcb;

        width: 100%;
        height: 40;
        bottom: 0;

        text-align: center;

    }

    @media (min-width: 768px) {

        }
</style>
