@extends('adminlte::page')
@section('css')
<!-- Tempus Dominus Styles -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
    <div class="shadow-lg p-3 mb-5 bg-body rounded text" id="filtros">
        <h5>Filtros</h5>
        {{-- <input type="text" class="form-control" id='datetimepicker1' value="01/01/2018 - 01/15/2018" /> --}}
        <form method="POST" action="{{route('filterData')}}">
            @csrf
            <div class=" row mb-3">
                <label for="datetimepicker1" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3" style='width:500px'>
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" name="dateRange" id='datetimepicker1'
                            value="{{$saveDate}}" />
                    </div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="datetimepicker1" class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3" style='width:500px'>
                        <select name="areaID" class="form-select" aria-label="Default select example">
                            @foreach ($areas as $area)
                            @if ($histFilter[0] == $area['id'])
                            <option value="{{$area['id']}}" selected>{{$area['areaName']}}</option>
                            @else
                            <option value="{{$area['id']}}">{{$area['areaName']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="datetimepicker1" class="col-sm-2 col-form-label">Fuente de dato</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3" style='width:500px'>
                        <select name="fuenteID" class="form-select" aria-label="Default select example">
                            @foreach ($fuentes as $fuente)
                            @if ($histFilter[1] == $fuente['id'])
                            <option value="{{$fuente['id']}}" selected>{{$fuente['desc']}}</option>
                            @else
                            <option value="{{$fuente['id']}}">{{$fuente['desc']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class=" row mb-3">
                <label for="datetimepicker1" class="col-sm-2 col-form-label">Tipo de dato</label>
                <div class="col-sm-10">
                    <div class="input-group mb-3" style='width:500px'>
                        <select name="datoID" class="form-select" aria-label="Default select example">
                            @foreach ($tdatos as $dato)
                            @if ($histFilter[2]==$dato['id'])
                            <option value="{{$dato['id']}}" selected>{{$dato['desc']}}</option>
                            @else
                            <option value="{{$dato['id']}}">{{$dato['desc']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            {{-- <div class="row mb-3">
                <div class="col-md-5 offset-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="onlyoff">
                        <label class="form-check-label" for="gridCheck1">
                            Mostrar solo status Apagado
                        </label>
                    </div>
                </div>
            </div> --}}
            <div align="right">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>
                    Filtrar</button>
            </div>
        </form>
    </div>

    <br>
    @if ($datos!='')
    <div class="shadow-lg p-3 mb-5 bg-body rounded text">
        <div class="justify-content-center" align="center">
            <h1 class="display-6">Reporte lecturas de {{$headerTitleD[$histFilter[2]][0]}}
                {{$headerTitleF[$histFilter[1]][0]}}</h1>
        </div>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Fase 1</th>
                    <th scope="col">Fase 2</th>
                    <th scope="col">Fase 3</th>
                </tr>
            </thead>
            <tbody>
                @if ($datos!='')
                @foreach ($datos as $dato)
                <tr>
                    <th>{{$dato['id']}}</th>
                    <td>{{$dato['fecha']}}</td>
                    <td>{{$dato['d1']}}</td>
                    <td>{{$dato['d2']}}</td>
                    <td>{{$dato['d3']}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center" id="pagination">
            @if ($datos!='')
            {{$datos->links()}}
            @endif
        </div>
    </div>
    @else
    <div class="shadow-lg p-3 mb-5 bg-body rounded text">
        <div class="justify-content-center" align="center">
            <h1 class="display-6">No se encontró información</h1>
        </div>
    </div>
    @endif

</div>
{{-- modal para seleccionar aeropuerto --}}
@include('modalAero')
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
    integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="../js/reports.js"></script>
<script src="../../js/reports.js"></script>



@endsection