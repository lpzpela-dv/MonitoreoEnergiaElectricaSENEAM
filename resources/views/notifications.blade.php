@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    #padd {
        padding-top: 15px;
    }

    #btnAdd {
        padding-right: 15px;
    }
</style>
@endsection
@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('content')
<div id="padd" class="container-fluid">
    <div class="shadow-lg p-3 mb-5 bg-body rounded text">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Descripción</th>
                            <th scope="col">Correos</th>
                            <th scope="col" class="text-center">Gestión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="table-active" style="width:20%">Alarma generada en cada cambio de
                                estado referente a
                                lecturas de energía
                                eléctrica</th>
                            <td style="width:60%">
                                {{$emails[0]->emails}}
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-outline-secondary"
                                    onclick="editNotif({{$emails[0]->id}})"><i
                                        class="fa-solid fa-pen-to-square"></i></button></td>
                        </tr>
                        <tr>
                            <th scope="row" class="table-active" style="width:20%">Alarma generada cuando se alcanza la
                                capacidad de
                                Diesel de 80%, 50%,20%
                            </th>
                            <td>
                                {{$emails[1]->emails}}
                            </td>
                            <td class="text-center"><button type="button" class="btn btn-outline-secondary"
                                    onclick="editNotif({{$emails[1]->id}})"><i
                                        class="fa-solid fa-pen-to-square"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
        {{-- @dump($emails) --}}

        {{-- <button type="button" class="btn btn-outline-secondary" onclick="editUser({{$user['id']}})"><i
                class="fa-solid fa-pen-to-square"></i></button>
        <button type="button" class="btn btn-outline-danger" onclick="deleteUser({{$user['id']}})"><i
                class="fa-solid fa-trash"></i></button> --}}

    </div>
    @include('modalEditEmails')
</div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="js/gemails.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
@endsection