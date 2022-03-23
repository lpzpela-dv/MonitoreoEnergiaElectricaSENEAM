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
    <div class="row align-self-end" id="btnAdd">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddUserModal"><i
                class="fa-solid fa-user-plus"></i></button>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $user)
            <tr id="row{{$user['id']}}">
                <th>{{$user['name']}}</th>
                <td>{{$user['email']}}</td>
                <td>
                    @if ($user['userRol'] == "1")
                    Administador
                    @else
                    Supervisor
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-outline-secondary" onclick="editUser({{$user['id']}})"><i
                            class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteUser({{$user['id']}})"><i
                            class="fa-solid fa-trash"></i></button>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
{{-- Modal Agregar/Editar usuarios --}}
@include('modalUser')
{{-- Modal Agregar/Editar usuarios --}}
@include('modalUserDelete')
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="js/guser.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
@endsection