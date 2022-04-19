@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    #padd {
        padding-top: 15px;
    }

    #LastVoltvalue,
    #LastAmpvalue {
        font-size: 30px;
    }

    #fontstext,
    #fontstext1 {
        font-size: 20px;
    }
</style>
@endsection
@section('content')
<div id="padd" class="container-fluid">
    <input type="hidden" id="lastValueVolt">
    <div class="shadow-lg p-3 mb-5 bg-body rounded text">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <p class="h4 text-center">Estatus de Areas</p>
                </tr>
                <tr id="showAreas">
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChartDiesel" height="110hv"></canvas>
        </div>
        <div class="col">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Area</th>
                        <th scope="col" class="text-center">Log de eventos</th>
                        <th scope="col" class="text-center">Fecha</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                </tbody>
            </table>
        </div>
    </div>
    {{-- modal para seleccionar aeropuerto --}}
    <div class="modal fade" id="selecAero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aeropuerto:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <select id="selectAero" class="form-select">

                                @foreach ($aeropuertos as $aeropuerto)
                                <option value="{{ $aeropuerto['id'] }}" selected>{{ $aeropuerto['shortName'] }} -
                                    {{
                                    $aeropuerto['description'] }}</option>
                                @endforeach

                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAero" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="https://kit.fontawesome.com/c5bf36bb97.js" crossorigin="anonymous"></script>
<script src="js/dgeneral.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
    integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection