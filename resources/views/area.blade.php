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
        <div class="row-md-6 align-self-end" id="btnAdd">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddAreaModal"><i
                    class="fa-solid fa-plus"></i></button>
        </div>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de Área</th>
                    <th scope="col">Capacidad máxima de planta</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                <tr id="row{{$area['id']}}">
                    <th>{{$area['id']}}</th>
                    <td>{{$area['areaName']}}</td>
                    <td>
                        {{$area['maxDiesel']}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-secondary" onclick="editArea({{$area['id']}})"><i
                                class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-outline-danger" onclick="deleteArea({{$area['id']}})"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- Modal Agregar/Editar usuarios --}}
@include('/modals/area/modalArea')
{{-- Modal Agregar/Editar usuarios --}}
@include('/modals/area/modalAreaDelete')
@include('/modals/area/modalAreaEdit')
{{-- modal para seleccionar aeropuerto --}}
@include('modalAero')
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="../js/garea.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
    integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection